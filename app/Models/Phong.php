<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    protected $table = 'phong';
    protected $primaryKey = 'p_ma';

    protected $fillable = [
        'p_ten', 'p_danhGia', 'p_trangThai', 'lp_ma'
    ];

    public $timestamps = false;

    public function loaiPhong()
    {
        return $this->belongsTo(LoaiPhong::class, 'lp_ma', 'lp_ma');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'p_ma', 'p_ma');
    }
}