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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->longText('mo_ta')->nullable();
            $table->longText('noi_dung')->nullable();
            $table->double('gia_ban')->nullable();
            $table->double('gia_moi')->nullable();
            $table->string('ma_san_pham')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->longText('tinh_trang')->nullable();
            $table->longText('noi_bat')->nullable();
            $table->longText('hang_moi_ve')->nullable();
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
        Schema::dropIfExists('san_phams');
    }
};
