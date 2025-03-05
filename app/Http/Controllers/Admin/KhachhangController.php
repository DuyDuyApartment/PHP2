<?php

namespace App\Http\Controllers\Admin;

use App\Models\KhachHang;    // Import Model KhachHang
use App\Models\Booking;      // Import Model Booking
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;  // Import DB của bạn
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function index()
    {
        $KhachHang = KhachHang::all();
        $dangthue = DB::table('booking as bk')
            ->select('bk.*', 'kh.*', 'p.p_ten')
            ->join('khachhang as kh', 'kh.id', '=', 'bk.kh_ma')
            ->join('phong as p', 'p.p_ma', '=', 'bk.p_ma')
            ->where('bk.bk_trangThai', 3)
            ->distinct()
            ->get();

        return view('admin.khachhang.index')
            ->with('KhachHang', $KhachHang)
            ->with('dangthue', $dangthue);
    }

    public function show($id)
    {
        $KhachHang = KhachHang::find($id);
        if (!$KhachHang) {
            Session::flash('alert-danger', 'Không tìm thấy khách hàng!');
            return back();
        }
        return view('admin.khachhang.show')->with('KhachHang', $KhachHang);
    }

    public function edit($id)
    {
        $KhachHang = KhachHang::find($id);
        if (!$KhachHang) {
            Session::flash('alert-danger', 'Không tìm thấy khách hàng!');
            return back();
        }
        return view('admin.khachhang.edit')->with('KhachHang', $KhachHang);
    }

    public function destroy($id)
    {
        $khachHang = KhachHang::find($id);
        if (!$khachHang) {
            Session::flash('alert-danger', 'Không tìm thấy khách hàng!');
            return back();
        }

        $bookings = Booking::where('kh_ma', $id)->get();
        if ($bookings->isEmpty()) {
            $khachHang->delete();
            Session::flash('alert-info', 'Xóa khách hàng thành công ^^~!!!');
        } else {
            Booking::where('kh_ma', $id)->delete();
            $khachHang->delete();
            Session::flash('alert-info', 'Đã xóa khách hàng và các booking liên quan ^^~!!!');
        }

        return back();
    }

    public function create() {}
    public function store(Request $request) {}
    public function update(Request $request, $id) {}
}