<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Tạm thời comment lại các seeder khác để test
        /*
        $this->call([
            LoaiPhongTableSeeder::class,
            NhanvienTableSeeder::class,
            QuyenTableSeeder::class,
        ]);
        */

        $this->call([
            LoaiPhongTableSeeder::class,
            PhongTableSeeder::class,
        ]);
    }
}
