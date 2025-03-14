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
        
        \Log::info('Room data:', ['data' => $db]);
        
        return view('user.orders.listlp', compact('db'));
    }

    public function create($id)
    {
        try {
            \Log::info('ID received:', ['id' => $id]);

            $loaiphong = DB::table('loai_phong')
                          ->where('lp_ma', $id)
                          ->first();

            if (!$loaiphong) {
                return back()->with('alert-danger', 'Không tìm thấy loại phòng.');
            }

            \Log::info('Loại phòng:', ['data' => $loaiphong]);

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
            $request->validate([
                'p_ma' => 'required|exists:phong,p_ma',
                'checkin' => 'required|date|after_or_equal:today',
                'checkout' => 'required|date|after:checkin',
                'adults' => 'required|integer|min:1',
                'children' => 'nullable|integer|min:0',
                'notes' => 'nullable|string',
            ]);

            if (!auth()->check()) {
                return back()->with('error', 'Vui lòng đăng nhập để đặt phòng.');
            }

            $kh_ma = auth()->user()->id;

            $phong = DB::table('phong')->where('p_ma', $request->p_ma)->first();
            if (!$phong) {
                return back()->with('error', 'Không tìm thấy phòng.');
            }
            $bk_maLoaiPhong = $phong->lp_ma;

            $loaiphong = DB::table('loai_phong')->where('lp_ma', $bk_maLoaiPhong)->first();
            $checkin = Carbon::parse($request->checkin);
            $checkout = Carbon::parse($request->checkout);
            $soDem = $checkout->diffInDays($checkin);
            $totalPrice = $loaiphong->lp_giaBan * $soDem;

            DB::beginTransaction();

            $bookingId = DB::table('booking')->insertGetId([
                'p_ma' => $request->p_ma,
                'kh_ma' => $kh_ma,
                'nv_ma' => 2,
                'bk_maLoaiPhong' => $bk_maLoaiPhong,
                'bk_thoiGianBatDau' => $request->checkin,
                'bk_thoiGianKetThuc' => $request->checkout,
                'bk_gia' => $totalPrice,
                'bk_trangThai' => 1,
                'bk_taoMoi' => now(),
                'bk_capNhat' => now()
            ]);

            DB::commit();

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

            DB::table('hoadon')
              ->where('hd_ma', $id)
              ->update([
                  'hd_trangThai' => 1,
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

    public function update(Request $request, $id)
    {
        try {
            // Xác thực yêu cầu
            $request->validate([
                '_token' => 'required',
            ]);

            // Kiểm tra xem người dùng có quyền hủy đặt phòng này không
            $booking = DB::table('booking')
                        ->where('bk_ma', $id)
                        ->where('kh_ma', auth()->user()->id)
                        ->first();

            if (!$booking) {
                return back()->with('error', 'Không tìm thấy đặt phòng hoặc bạn không có quyền hủy.');
            }

            // Chỉ cho phép hủy nếu trạng thái là "Đang đợi xử lý" (1) hoặc "Đã xác nhận" (2)
            if ($booking->bk_trangThai != 1 && $booking->bk_trangThai != 2) {
                return back()->with('error', 'Không thể hủy đặt phòng ở trạng thái này.');
            }

            DB::beginTransaction();

            // Cập nhật trạng thái đặt phòng thành "Khách đã hủy" (5)
            DB::table('booking')
              ->where('bk_ma', $id)
              ->update([
                  'bk_trangThai' => 5,
                  'bk_capNhat' => now()
              ]);

            DB::commit();

            return redirect()->back()->with('success', 'Đã hủy đặt phòng thành công!');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Update booking error: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi hủy đặt phòng: ' . $e->getMessage());
        }
    }

    public function myBookings()
    {
        try {
            $bookings = DB::select('SELECT DISTINCT *, bk.bk_ma FROM booking as bk
                INNER JOIN khachhang as kh ON kh.id = bk.kh_ma
                INNER JOIN nhanvien as nv ON nv.id = bk.nv_ma
                INNER JOIN phong as p ON p.p_ma = bk.p_ma
                WHERE bk.kh_ma = ? ORDER BY bk_ma DESC', [auth()->user()->id]);

            return view('user.khachhang.show', ['a' => $bookings]);
        } catch (\Exception $e) {
            \Log::error('My bookings error: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi tải lịch sử đặt phòng.');
        }
    }
}