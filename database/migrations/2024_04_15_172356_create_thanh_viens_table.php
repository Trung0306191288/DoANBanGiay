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
        Schema::create('thanh_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->string('username');
            $table->string('password');
            $table->string('dia_chi')->nullable();
            $table->string('dien_thoai')->nullable();
            $table->string('email')->nullable();
            $table->string('nam_sinh')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->string('remember_token')->nullable();
            $table->longText('tinh_trang')->nullable();
            $table->integer('vai_tro');
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
        Schema::dropIfExists('thanh_viens');
    }
};
