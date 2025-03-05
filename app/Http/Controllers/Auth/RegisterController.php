<?php

namespace App\Http\Controllers\Auth;

use App\Models\KhachHang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/'; // Sau khi đăng ký xong sẽ tự động đăng nhập và chuyển về trang /

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();

        try {
            $kh = $this->create($request->all());

            Auth::login($kh);

            return redirect($this->redirectPath())->with('success', 'Đăng ký thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi đăng ký: ' . $e->getMessage());
            return back()
                ->withErrors(['error' => 'Lỗi: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:100|unique:khachhang,email',
            'password' => 'required|string|min:3',
            'kh_hoTen' => 'required|string|max:50',
            'kh_gioiTinh' => 'required|in:1,0',
            'kh_diaChi' => 'required',
            'kh_dienThoai' => 'required|numeric'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
            'kh_hoTen.required' => 'Vui lòng nhập họ tên',
            'kh_gioiTinh.required' => 'Vui lòng chọn giới tính',
            'kh_gioiTinh.in' => 'Giới tính không hợp lệ',
            'kh_diaChi.required' => 'Vui lòng nhập địa chỉ',
            'kh_dienThoai.required' => 'Vui lòng nhập số điện thoại',
            'kh_dienThoai.numeric' => 'Số điện thoại phải là số'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\KhachHang
     */
    protected function create(array $data)
    {
        return KhachHang::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'kh_hoTen' => $data['kh_hoTen'],
            'kh_gioiTinh' => $data['kh_gioiTinh'],
            'kh_email' => $data['email'], // copy từ email chính
            'kh_diaChi' => $data['kh_diaChi'],
            'kh_dienThoai' => $data['kh_dienThoai'],
            'kh_trangThai' => 0
        ]);
    }
}
