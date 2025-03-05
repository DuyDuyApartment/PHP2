<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'nhanvien';
    protected $primaryKey = 'nv_ma';
    public $timestamps = false;

    protected $fillable = [
        'nv_hoTen',
        'nv_email',
        'nv_dienThoai',
        'nv_trangThai'
    ];

    public function hoadon()
    {
        return $this->hasMany(HoaDon::class, 'nv_ma', 'nv_ma');
    }
} 