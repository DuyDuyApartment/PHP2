<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoadon';
    protected $primaryKey = 'hd_ma';
    
    const CREATED_AT = 'hd_taoMoi';
    const UPDATED_AT = 'hd_capNhat';

    protected $fillable = [
        'p_ma',
        'kh_ma',
        'nv_ma',
        'hd_gia',
        'hd_trangThai'
    ];

    public function phong()
    {
        return $this->belongsTo(Phong::class, 'p_ma', 'p_ma');
    }

    public function khachhang()
    {
        return $this->belongsTo(KhachHang::class, 'kh_ma', 'kh_ma');
    }

    public function nhanvien()
    {
        return $this->belongsTo(NhanVien::class, 'nv_ma', 'nv_ma');
    }
} 