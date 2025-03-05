<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Khachhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->tinyInteger('id', true, true)->length(5);
            $table->string('email', 100)->nullable();
            $table->string('password', 256)->nullable();
            $table->string('kh_hoTen', 100)->comment('Họ tên');
            $table->tinyInteger('kh_gioiTinh')->default(1)
                ->comment('Giới tính: 0-Nữ, 1-Nam');
            $table->string('kh_email', 100)->nullable();
            $table->string('kh_diaChi', 250)->comment('Địa chỉ');
            $table->string('kh_dienThoai', 11)->comment('Điện thoại');
            $table->string('remember_token', 191)->nullable();
            $table->timestamp('kh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('kh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('kh_trangThai')->default(0);
        });
        DB::statement("ALTER TABLE `khachhang` comment 'khách hàng # khách hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
