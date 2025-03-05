<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrangThaiToKhachhangTable extends Migration
{
    public function up()
    {
        Schema::table('khachhang', function (Blueprint $table) {
            // Thêm cột kh_trangThai vào cuối bảng thay vì sau kh_capNhat
            $table->tinyInteger('kh_trangThai')->default(1);
        });
    }

    public function down()
    {
        Schema::table('khachhang', function (Blueprint $table) {
            $table->dropColumn('kh_trangThai');
        });
    }
}