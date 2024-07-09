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
        Schema::create('cau_hinh_chungs', function (Blueprint $table) {
            $table->id();
            $table->string('dien_thoai');
            $table->string('hotline');
            $table->string('zalo');
            $table->string('copyright');
            $table->string('email');
            $table->string('fanpage');
            $table->string('dia_chi');
            $table->longText('link_map')->nullable();
            $table->integer('khoang_gia');
            $table->integer('khoang_gia_admin')->nullable();
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
        Schema::dropIfExists('cau_hinh_chungs');
    }
};
