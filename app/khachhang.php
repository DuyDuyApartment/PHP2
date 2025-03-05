<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class khachhang extends Authenticatable 
{
    use Notifiable;
    
    protected $table = 'khachhang';

    protected $fillable = [
        'password',
        'kh_hoTen',
        'kh_gioiTinh',
        'kh_email',
        'kh_diaChi',
        'kh_dienThoai',
        'kh_trangThai',
    ];

    protected $primaryKey = 'id';
    
    protected $dates = ['kh_taoMoi', 'kh_capNhat'];
    
    protected $dateFormat = 'Y-m-d H:i:s';
    
    const CREATED_AT = 'kh_taoMoi';
    const UPDATED_AT = 'kh_capNhat';

    protected $hidden = [
        'password', 
        'remember_token',
    ];
}
