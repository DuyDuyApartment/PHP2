<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiPhong;
use App\Models\HoaDon;
use App\Models\Phong;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    
    public function index()
    {
        $db = DB::table('loai_phong')
                ->where('lp_trangThai', 2)
                ->get();
        
        // Debug: Kiểm tra dữ liệu
        \Log::info('Room data:', ['data' => $db]);
        
        return view('user.orders.listlp', compact('db'));
    }

    public function create($id)
    {
        try {
            // Debug: In ra ID nhận được
            \Log::info('ID received:', ['id' => $id]);

            // Lấy thông tin loại phòng - sử dụng tên bảng chính xác
            $loaiphong = DB::table('loai_phong')
                          ->where('lp_ma', $id)
                          ->first();

            if (!$loaiphong) {
                return back()->with('alert-danger', 'Không tìm thấy loại phòng.');
            }

            // Debug: In ra thông tin loại phòng
            \Log::info('Loại phòng:', ['data' => $loaiphong]);

            // Kiểm tra phòng trống
            $phongTrong = DB::table('phong')
                           ->where('lp_ma', $id)
                           ->where('p_trangThai', 2)
                           ->first();

            if (!$phongTrong) {
                return back()->with('alert-warning', 'Hiện tại không có phòng trống thuộc loại này.');
            }

            return view('user.orders.create', compact('loaiphong', 'phongTrong'));

        } catch (\Exception $e) {
            \Log::error('Error in create: ' . $e->getMessage());
            return back()->with('alert-danger', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            // Xác thực dữ liệu từ form
            $request->validate([
                'p_ma' => 'required|exists:phong,p_ma',
                'checkin' => 'required|date|after_or_equal:today',
                'checkout' => 'required|date|after:checkin',
                'adults' => 'required|integer|min:1',
                'children' => 'nullable|integer|min:0',
                'notes' => 'nullable|string',
            ]);

            // Kiểm tra người dùng đã đăng nhập chưa
            if (!auth()->check()) {
                return back()->with('error', 'Vui lòng đăng nhập để đặt phòng.');
            }

            // Lấy kh_ma từ người dùng đã đăng nhập (giả định kh_ma là id trong bảng khachhang)
            $kh_ma = auth()->user()->id; // Giả định auth()->user() trả về model KhachHang với id làm kh_ma

            // Lấy bk_maLoaiPhong từ bảng phong dựa trên p_ma
            $phong = DB::table('phong')->where('p_ma', $request->p_ma)->first();
            if (!$phong) {
                return back()->with('error', 'Không tìm thấy phòng.');
            }
            $bk_maLoaiPhong = $phong->lp_ma; // Lấy lp_ma (mã loại phòng) từ bảng phong

            // Tính giá tiền (nếu total_price chưa được gửi từ form)
            $loaiphong = DB::table('loai_phong')->where('lp_ma', $bk_maLoaiPhong)->first();
            $checkin = Carbon::parse($request->checkin);
            $checkout = Carbon::parse($request->checkout);
            $soDem = $checkout->diffInDays($checkin);
            $totalPrice = $loaiphong->lp_giaBan * $soDem;

            DB::beginTransaction();

            // Lưu booking (không cập nhật p_trangThai)
            $bookingId = DB::table('booking')->insertGetId([
                'p_ma' => $request->p_ma,
                'kh_ma' => $kh_ma,
                'nv_ma' => 2, // Sử dụng nv_ma = 2 (giá trị hợp lệ từ nhanvien)
                'bk_maLoaiPhong' => $bk_maLoaiPhong,
                'bk_thoiGianBatDau' => $request->checkin,
                'bk_thoiGianKetThuc' => $request->checkout,
                'bk_gia' => $totalPrice,
                'bk_trangThai' => 1,
                'bk_taoMoi' => now(),
                'bk_capNhat' => now()
            ]);

            // Không cập nhật p_trangThai ở đây, giữ nguyên p_trangThai = 2 (Khả dụng)

            DB::commit();

            // Redirect về trang create với thông báo thành công
            return redirect()->route('orders.create', $loaiphong->lp_ma)
                            ->with('success', 'Đặt phòng thành công! Vui lòng chờ admin xét duyệt.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Booking error: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi đặt phòng: ' . $e->getMessage());
        }
    }

    public function showInvoice($id)
    {
        try {
            $hoadon = DB::table('booking')
                       ->join('phong', 'hoadon.p_ma', '=', 'phong.p_ma')
                       ->join('loaiphong', 'phong.lp_ma', '=', 'loaiphong.lp_ma')
                       ->join('khachhang', 'hoadon.kh_ma', '=', 'khachhang.kh_ma')
                       ->join('nhanvien', 'hoadon.nv_ma', '=', 'nhanvien.nv_ma')
                       ->where('hoadon.hd_ma', $id)
                       ->select('hoadon.*', 'phong.*', 'loaiphong.*', 
                               'khachhang.kh_hoTen', 'khachhang.kh_email',
                               'nhanvien.nv_hoTen')
                       ->first();

            if (!$hoadon) {
                return back()->with('error', 'Không tìm thấy hóa đơn');
            }

            return view('user.orders.invoice', compact('hoadon'));
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function processPayment($id)
    {
        try {
            DB::beginTransaction();

            // Cập nhật trạng thái hóa đơn
            DB::table('hoadon')
              ->where('hd_ma', $id)
              ->update([
                  'hd_trangThai' => 1, // 1 = đã thanh toán
              ]);

            DB::commit();

            return redirect()->route('orders.invoice', $id)
                           ->with('alert-success', 'Thanh toán thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('alert-danger', 'Có lỗi xảy ra khi thanh toán: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $booking = DB::table('booking as bk')
                ->join('khachhang as kh', 'kh.kh_ma', '=', 'bk.kh_ma')
                ->join('phong as p', 'p.p_ma', '=', 'bk.p_ma')
                ->where('bk.bk_ma', $id)
                ->first();

            if (!$booking) {
                return back()->with('error', 'Không tìm thấy thông tin đặt phòng.');
            }

            return view('user.orders.edit', ['booking' => $booking]);
        } catch (\Exception $e) {
            \Log::error('Edit booking error: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi xem thông tin đặt phòng.');
        }
    }
}