<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gia_theo_kich_thuocs', function (Blueprint $table) {
            $table->id();
            $table->integer('gia_ban')->nullable();
            $table->integer('gia_moi')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->integer('kho_hang')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gia_theo_kich_thuocs');
    }
};
