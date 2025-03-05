<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('p_ma')->autoIncrement()->comment('Mã Phòng');
            $table->string('p_ten', 191)->comment('Tên Phòng # Tên Phòng');
            $table->string('p_danhGia', 50)->default('0;0;0;0;0');
            $table->timestamp('p_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('p_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('p_trangThai')->default('2');
            $table->unsignedTinyInteger('lp_ma')->comment('Loại Phòng');

            $table->unique(['p_ten']);
            $table->foreign('lp_ma')
                ->references('lp_ma')->on('loai_phong')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `phong` comment 'Phong # Phong'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phong');
    }
}
