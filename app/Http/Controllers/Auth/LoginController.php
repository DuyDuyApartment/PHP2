<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    // Ghi đè phương thức username() để sử dụng email thay vì kh_taiKhoan
    public function username()
    {
        return 'email';
    }

    // Ghi đè phương thức credentials để map đúng tên cột
    protected function credentials(Request $request)
    {
        return [
            'email' => $request->get($this->username()),
            'password' => $request->get('password'),
        ];
    }

    // Tùy chỉnh thông báo lỗi
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => [trans('auth.failed')],
            ]);
    }
}
