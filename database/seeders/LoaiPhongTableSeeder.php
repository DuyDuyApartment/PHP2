<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiPhongTableSeeder extends Seeder
{
    public function run()
    {
        // Xóa dữ liệu cũ
        DB::table('loai_phong')->delete();

        // Thêm dữ liệu mẫu
        DB::table('loai_phong')->insert([
            [
                'lp_ma' => 1,
                'lp_ten' => 'Standard Room',
                'lp_giaBan' => 500000,
                'lp_thongTin' => 'Phòng tiêu chuẩn với đầy đủ tiện nghi cơ bản',
                'lp_trangThai' => 1,
                'lp_hinh' => 'standard.jpg',
            ],
            [
                'lp_ma' => 2,
                'lp_ten' => 'Deluxe Room',
                'lp_giaBan' => 800000,
                'lp_thongTin' => 'Phòng cao cấp với không gian rộng rãi và view đẹp',
                'lp_trangThai' => 1,
                'lp_hinh' => 'deluxe.jpg',
            ],
            [
                'lp_ma' => 3,
                'lp_ten' => 'Suite Room',
                'lp_giaBan' => 1200000,
                'lp_thongTin' => 'Phòng hạng sang với đầy đủ tiện nghi cao cấp',
                'lp_trangThai' => 1,
                'lp_hinh' => 'suite.jpg',
            ],
        ]);
    }
} 