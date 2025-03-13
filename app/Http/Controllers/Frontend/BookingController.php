<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Booking;
use App\Models\Phong;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = DB::select('
            SELECT DISTINCT bk.*, kh.kh_hoTen, kh.kh_dienThoai, p.p_ten
            FROM booking AS bk
            LEFT JOIN khachhang AS kh ON kh.id = bk.kh_ma
            LEFT JOIN phong AS p ON p.p_ma = bk.p_ma
            WHERE bk.bk_trangThai = 1
            ORDER BY bk.bk_taoMoi DESC
        ');

        return view('admin.bookings.check', ['bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lp = LoaiPhong::all();
        $phong = Phong::all();
        $db = DB::select('
            SELECT * FROM loai_phong
            WHERE lp_trangThai = 2;
        ');
        $bk = HoaDon::where('bk_trangThai', 1);
        return view('user.orders.list')->with('bk', $bk)->with('db', $db)->with('phong', $phong)->with('lp', $lp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no' => 'required|exists:rooms,no',
            'phone' => 'required|phone',
            'name' => 'required',
            'bk_thoiGianBatDau' => 'required|date|after:today',
            'bk_thoiGianKetThuc' => 'required|date|after:bk_thoiGianBatDau|live_half_month_and_not_conflict'
        ], [], [
            'phone' => 'phone',
            'name' => 'name',
            'check_in_at' => 'arrival date',
            'check_out_at' => 'departure date'
        ]);

        $validation = $request->validate([
            'bk_thoiGianBatDau' => 'required|after:tomorrow',
            'bk_thoiGianKetThuc' => 'required|after_or_equal:bk_thoiGianBatDau',
        ]);

        // Tạo mới object SanPham
        $bk = new Booking();
        $bk->bk_thoiGianBatDau = $request->bk_thoiGianBatDau;
        $bk->bk_thoiGianKetThuc = $request->bk_thoiGianKetThuc;
        $bk->bk_maLoaiPhong = $request->bk_maLoaiPhong;
        $bk->bk_trangThai = 3;
        $bk->kh_ma = Auth::user()->id;
        $bk->nv_ma = 2;
        Session::flash('alert-success', 'Cập nhật thành công ^^~!!!');

        // $bk->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $bk_ma)
    {
        try {
            $booking = Booking::where('bk_ma', $bk_ma)->first();

            if (!$booking) {
                return back()->with('error', 'Không tìm thấy đơn đặt phòng!');
            }

            DB::beginTransaction();

            $booking->bk_trangThai = 6; // Hủy
            $booking->bk_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
            $booking->save();

            $phong = Phong::find($booking->p_ma);
            $phong->p_trangThai = 2; // Khả dụng
            $phong->save();

            DB::commit();

            Session::flash('alert-success', 'Đã hủy đặt phòng thành công!');
            return redirect()->route('backend.booking.index');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Hủy booking error: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi hủy đặt phòng.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bk_ma)
{
    try {
        $booking = Booking::where('bk_ma', $bk_ma)->first();

        if (!$booking) {
            return back()->with('error', 'Không tìm thấy đơn đặt phòng!');
        }

        DB::beginTransaction();

        $i = $booking->bk_thoiGianBatDau;
        $o = $booking->bk_thoiGianKetThuc;

        $date1 = date_create($i);
        $date2 = date_create($o);
        $diff = date_diff($date1, $date2);

        $no = $booking->p_ma;
        $currOrders = Booking::where('p_ma', $no)
            ->where('bk_thoiGianKetThuc', '>=', Carbon::today())
            ->where('bk_trangThai', '=', 2)
            ->select('bk_thoiGianBatDau', 'bk_thoiGianKetThuc')
            ->get();

        $conflict = count($currOrders) != 0;
        foreach ($currOrders as $books) {
            if (($i >= $books->bk_thoiGianKetThuc) || ($o <= $books->bk_thoiGianBatDau)) {
                $conflict = 0;
            } else {
                $conflict = 1;
                break;
            }
        }

        if ($conflict == 1) {
            Session::flash('alert-danger', 'Phòng đã được đặt, vui lòng thông báo khách hàng!');
            return back()->withInput();
        }

        $booking->bk_trangThai = 2; // Đảm bảo cập nhật thành 2
        $booking->nv_ma = auth()->guard('admin')->user()->id ?? 2;
        $booking->bk_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $booking->save();

        $phong = Phong::find($booking->p_ma);
        $phong->p_trangThai = 2; // Đã đặt
        $phong->save();

        DB::commit();

        Session::flash('alert-success', 'Duyệt đơn đặt phòng thành công!');
        return redirect()->route('backend.booking.index');
    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Duyệt booking error: ' . $e->getMessage());
        return back()->with('error', 'Có lỗi xảy ra khi duyệt đặt phòng.');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkin($id)
    {
        $bookings = Booking::where("bk_ma", $id)->first();

        $bookings->bk_trangThai = 3;
        $bookings->bk_thoiGianBatDau = Carbon::now('Asia/Ho_Chi_Minh');
        $bookings->bk_capNhat = Carbon::now('Asia/Ho_Chi_Minh');

        $bookings->update();

        $a = Phong::where("p_ma", $bookings->p_ma)->first();
        $a->p_trangThai = 1;
        $a->update();
        Session::flash('alert-success', 'Check in khách hàng booking thành công!');
        return back();
    }

    /**
     * Display active bookings (phòng đang sử dụng).
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $bookings = DB::select('
            SELECT DISTINCT bk.*, kh.kh_hoTen, kh.kh_dienThoai, p.p_ten
            FROM booking AS bk
            INNER JOIN khachhang AS kh ON kh.id = bk.kh_ma
            INNER JOIN phong AS p ON p.p_ma = bk.p_ma
            WHERE bk.bk_trangThai = 2
            ORDER BY bk.bk_capNhat DESC
        ');

        return view('admin.bookings.active', ['bookings' => $bookings]);
    }
}