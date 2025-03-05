<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhongTableSeeder extends Seeder
{
    public function run()
    {
        // Xóa dữ liệu cũ
        DB::table('phong')->delete();

        // Thêm dữ liệu mẫu
        DB::table('phong')->insert([
            [
                'p_ma' => 1,
                'p_ten' => 'Phòng 101',
                'p_danhGia' => '4;4;4;4;4',
                'p_trangThai' => 2,
                'lp_ma' => 1, // Giả sử loại phòng Standard có lp_ma = 1
            ],
            [
                'p_ma' => 2,
                'p_ten' => 'Phòng 102',
                'p_danhGia' => '4;4;4;4;4',
                'p_trangThai' => 2,
                'lp_ma' => 1,
            ],
            [
                'p_ma' => 3,
                'p_ten' => 'Phòng 201',
                'p_danhGia' => '5;5;5;5;5',
                'p_trangThai' => 2,
                'lp_ma' => 2, // Giả sử loại phòng Deluxe có lp_ma = 2
            ],
            [
                'p_ma' => 4,
                'p_ten' => 'Phòng 202',
                'p_danhGia' => '5;5;5;5;5',
                'p_trangThai' => 2,
                'lp_ma' => 2,
            ],
            [
                'p_ma' => 5,
                'p_ten' => 'Phòng 301',
                'p_danhGia' => '5;5;5;5;5',
                'p_trangThai' => 2,
                'lp_ma' => 3, // Giả sử loại phòng Suite có lp_ma = 3
            ],
            [
                'p_ma' => 6,
                'p_ten' => 'Phòng 302',
                'p_danhGia' => '5;5;5;5;5',
                'p_trangThai' => 2,
                'lp_ma' => 3,
            ],
        ]);
    }
} 