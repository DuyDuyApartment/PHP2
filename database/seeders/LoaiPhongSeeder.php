<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiPhongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loaiphong')->insert([
            [
                'ten' => 'Deluxe Room',
                'giaBan' => 1200000,
                'thongTin' => 'Phòng sang trọng với view đẹp, đầy đủ tiện nghi cao cấp',
                'hinh' => 'deluxe-room.jpg',
                'trangThai' => 1
            ],
            [
                'ten' => 'Superior Room',
                'giaBan' => 800000,
                'thongTin' => 'Phòng tiêu chuẩn với đầy đủ tiện nghi cơ bản',
                'hinh' => 'superior-room.jpg',
                'trangThai' => 1
            ],
            [
                'ten' => 'Family Suite',
                'giaBan' => 1500000,
                'thongTin' => 'Phòng gia đình rộng rãi với 2 giường lớn',
                'hinh' => 'family-suite.jpg',
                'trangThai' => 1
            ],
            [
                'ten' => 'Executive Suite',
                'giaBan' => 2000000,
                'thongTin' => 'Phòng hạng sang với phòng khách riêng biệt',
                'hinh' => 'executive-suite.jpg',
                'trangThai' => 1
            ]
        ]);
    }
}
