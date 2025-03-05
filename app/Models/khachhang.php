<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class KhachHang extends Authenticatable
{
    use Notifiable;

    /**
     * Tên bảng tương ứng trong CSDL
     *
     * @var string
     */
    protected $table = 'khachhang';

    /**
     * Khóa chính của bảng
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Các trường có thể gán giá trị
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'kh_hoTen',
        'kh_gioiTinh',
        'kh_email',
        'kh_diaChi',
        'kh_dienThoai',
        'kh_trangThai'
    ];

    /**
     * Các trường ẩn khi truy xuất
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Các trường ngày tháng
     *
     * @var array
     */
    protected $dates = [
        'kh_taoMoi',
        'kh_capNhat'
    ];

    // Tắt timestamps
    public $timestamps = false;

    // Thêm phương thức này để Auth có thể hoạt động
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'email';
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function hoadon()
    {
        return $this->hasMany(HoaDon::class, 'kh_ma', 'id');
    }
}