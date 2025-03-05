<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking'; // Tên bảng thực tế
    protected $primaryKey = 'bk_ma'; // Khóa chính thực tế

    protected $fillable = [
        'p_ma',
        'kh_ma',
        'nv_ma',
        'bk_maLoaiPhong',
        'bk_thoiGianBatDau',
        'bk_thoiGianKetThuc',
        'bk_trangThai',
        'bk_gia',
        'bk_taoMoi',
        'bk_capNhat',
    ];

    protected $dates = [
        'bk_thoiGianBatDau',
        'bk_thoiGianKetThuc',
        'bk_taoMoi',
        'bk_capNhat',
    ];

    public $timestamps = false; // Tắt timestamps mặc định

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'kh_ma', 'id');
    }

    public function phong()
    {
        return $this->belongsTo(Phong::class, 'p_ma', 'p_ma');
    }

    public function loaiPhong()
    {
        return $this->belongsTo(LoaiPhong::class, 'bk_maLoaiPhong', 'lp_ma');
    }

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'nv_ma', 'id');
    }
}
//......///