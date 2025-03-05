<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiPhong extends Model
{
    protected $table = 'loai_phong';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'ten', 
        'giaBan', 
        'thongTin', 
        'hinh', 
        'trangThai'
    ];
} 