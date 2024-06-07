<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang');
            $table->string('ho_ten');
            $table->string('dien_thoai');
            $table->string('email');
            $table->string('dia_chi');
            $table->string('ghi_chu');
            $table->integer('tong_gia');
            $table->string('hinh_thuc_thanh_toan');
            $table->string('tinh_trang_don_hang');
            $table->string('tinh_trang_hinh_thuc');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_hangs');
    }
};
