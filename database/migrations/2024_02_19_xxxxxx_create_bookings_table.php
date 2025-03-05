<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bk_ma();
            $table->foreignId('id')->nullable()->constrained('khachhang')->onDelete('set null');
            $table->unsignedTinyInteger('loaiphong_id'); // Thay đổi kiểu dữ liệu để khớp với lp_ma
            $table->foreign('loaiphong_id')
                ->references('lp_ma')->on('loai_phong') // Sửa tên bảng và cột tham chiếu
                ->onDelete('cascade');
            $table->date('checkin');
            $table->date('checkout');
            $table->integer('adults');
            $table->integer('children')->default(0);
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
