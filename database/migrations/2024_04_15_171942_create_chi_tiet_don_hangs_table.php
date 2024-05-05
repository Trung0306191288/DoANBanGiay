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
        Schema::create('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_don_hang')->constrained('don_hangs')->nullable();
            $table->foreignId('id_san_pham')->constrained('san_phams')->nullable();
            $table->integer('tong_gia');
            $table->integer('gia_ban');
            $table->integer('gia_giam');
            // $table->integer('ship_price')->nullable();
            $table->string('hinh_anh');
            $table->string('ten_kich_thuoc');
            $table->string('ten_mau_sac');
            $table->integer('so_luong');
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
        Schema::dropIfExists('chi_tiet_don_hangs');
    }
};
