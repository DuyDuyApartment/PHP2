<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiPhong;
use Illuminate\Support\Facades\Session;
use Validator;
use Storage;
use App\Models\Phong;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Booking;
use Carbon\Carbon;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Auth;

class HoadonController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.hoadon.create')->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'kh_ten'=>'required|max:30|min:5',
            'kh_diaChi'=>'required|max:30|min:5',
            'kh_dienThoai'=>'required|min:10',
            'bk_thoiGianKetThuc' => 'required|date|after:today',
        ], [
            'bk_thoiGianKetThuc.after' => 'Thời Gian Ra Sau Ngày Hôm Nay',
            'name.required'=>'Họ và tên không hợp lệ'
        ]);

        $i = Carbon::now('Asia/Ho_Chi_Minh');
        $o = $request->bk_thoiGianKetThuc;
        $date1 = date_create($i);
        $date2 = date_create($o);
        $diff = date_diff($date1, $date2);

        if ($diff->days > 15) {
            Session::flash('alert-danger', 'Không được đặt phòng quá 15 ngày @@@!!!');
            return back()->withInput();
        }

        $no = $request->p_ma;
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
            Session::flash('alert-danger', 'Xung đột thời gian với, vui lòng chọn ngày khác @@@!!!');
            return back()->withInput();
        }

        $p = new KhachHang();
        $p->kh_hoTen = $request->kh_ten;
        $p->kh_diaChi = $request->kh_diaChi;
        $p->kh_dienThoai = $request->kh_dienThoai;
        $p->kh_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $p->kh_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $p->kh_gioiTinh = $request->kh_gioiTinh;
        $p->save();
        $kh = $p->id;

        $lp = DB::table('phong')->select('lp_ma')->where('p_ma', $request->p_ma)->first();

        $pt = KhachHang::where("kh_hoTen", $request->kh_ten)->first();

        $bk = new Booking();
        $bk->kh_ma = $p->id;
        $bk->p_ma = $request->p_ma;
        $bk->bk_maLoaiPhong = $lp->lp_ma;
        $bk->nv_ma = 2;
        $bk->bk_thoiGianBatDau = $i;
        $bk->bk_thoiGianKetThuc = $request->bk_thoiGianKetThuc;
        $bk->bk_trangThai = 3;
        $bk->save();

        $a = Phong::where("p_ma", $request->p_ma)->first();
        $a->p_trangThai = 1;
        $a->update();
        Session::flash('alert-success', 'Thêm khách hàng mới thành công ^^~!!!');

        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Tìm booking với p_ma và bk_trangThai = 3
        $a = DB::table('booking')->where('p_ma', $id)->where('bk_trangThai', 3)->first();

        // Debug: Kiểm tra giá trị $id và kết quả query
        \Log::info('Show method - ID:', ['id' => $id]);
        \Log::info('Query result for booking:', ['result' => $a]);

        // Kiểm tra nếu không tìm thấy booking
        if (!$a) {
            return back()->with('error', 'Không tìm thấy booking đang sử dụng cho phòng này. Vui lòng kiểm tra mã phòng hoặc trạng thái booking. (p_ma = ' . $id . ', bk_trangThai = 3)');
        }

        $b = $a->bk_ma;
        $db = DB::select('
            SELECT * FROM booking AS bk
            INNER JOIN phong AS p ON bk.p_ma = p.p_ma
            INNER JOIN khachhang AS kh ON kh.id = bk.kh_ma
            INNER JOIN nhanvien AS nv ON nv.id = bk.nv_ma
            INNER JOIN loai_phong AS l ON l.lp_ma = bk.bk_maLoaiPhong
            WHERE bk.bk_ma = ? ORDER BY bk.bk_ma
        ', [$b]);
        $bk = Booking::where("bk_ma", $b)->first();
        $diff = abs(strtotime($bk->bk_thoiGianBatDau) - strtotime($bk->bk_thoiGianKetThuc));

        $hours = ROUND($diff / (60 * 60));
        if ($hours < 1) {
            $hours = 1;
        }
        $days = $hours / 24;
        $p = Phong::where("p_ma", $id)->first();
        $l = LoaiPhong::where("lp_ma", $p->lp_ma)->first();

        if ($hours <= 5) {
            $giatien = ($hours * ($l->lp_giaBan / 5));
        } else if ($days < 1) {
            $days = 1;
            $giatien = $days * $l->lp_giaBan;
        } else {
            if ($hours % 24 > 5) {
                $days += 0.4;
            }
            $days = ROUND($days);
            $giatien = $days * $l->lp_giaBan;
        }

        $bk = Booking::where('bk_ma', $a->bk_ma)->first();
        $bk->bk_gia = $giatien;
        $bk->save();
        $today = Carbon::now('Asia/Ho_Chi_Minh');
        return view('admin.hoadon.pay')->with('days', $days)->with('db', $db)->with('giatien', $giatien)->with('hours', $hours)->with('today', $today);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = DB::select('
            SELECT * FROM booking AS bk
            INNER JOIN phong AS p ON bk.p_ma = p.p_ma
            INNER JOIN khachhang AS kh ON kh.kh_ma = bk.kh_ma
            INNER JOIN nhanvien AS nv ON nv.nv_ma = bk.nv_ma
            INNER JOIN loai_phong AS l ON l.lp_ma = p.lp_ma
            WHERE bk.p_ma = ?
        ', [$id]);

        return view('admin.hoadon.edit')->with('id', $id)->with('db', $db);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // Tìm booking với p_ma và bk_trangThai = 3
        $a = DB::table('booking')->where('p_ma', $id)->where('bk_trangThai', 3)->first();

        // Debug: Kiểm tra giá trị $id và kết quả query
        \Log::info('Update method - ID:', ['id' => $id]);
        \Log::info('Query result for booking:', ['result' => $a]);

        // Kiểm tra nếu không tìm thấy booking
        if (!$a) {
            return back()->with('error', 'Không tìm thấy booking đang sử dụng cho phòng này. Vui lòng kiểm tra mã phòng hoặc trạng thái booking. (p_ma = ' . $id . ', bk_trangThai = 3)');
        }

        $b = $a->bk_ma;
        $bk = Booking::where("bk_ma", $b);

        $bk->bk_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $affected = DB::table('booking')
            ->where('bk_ma', $b)
            ->update(['bk_thoiGianKetThuc' => Carbon::now('Asia/Ho_Chi_Minh')]);

        Session::flash('alert-success', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('phong')
            ->where('p_ma', $id)
            ->update(['p_trangThai' => 2]);

        $a = DB::table('booking')->where('p_ma', $id)->orderBy('bk_ma', 'desc')->first();
        $b = $a->bk_ma;
        $booking1 = Booking::find($b);
        $booking1->delete();
        Session::flash('alert-success', 'Xóa thành công ^^~!!!');
        return redirect()->route('admin.dashboard');
    }

    public function pay(Request $request)
    {
        $id = $request->bk_ma;
        $bk = Booking::where("bk_ma", $id)->first();
        $bk->bk_trangThai = 4;
        $bk->nv_ma = Auth::user()->id;
        $bk->save();
        $affected = DB::table('phong')
            ->where('p_ma', $request->p_ma)
            ->update(['p_trangThai' => 2]);
        Session::flash('alert-success', 'Thanh toán thành công ^^~!!!');
        return redirect()->route('admin.dashboard');
    }
}