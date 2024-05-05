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
        Schema::create('danh_muc_cap_hais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cap_mot')->constrained('danh_muc_cap_mots')->nullable(); 
            $table->string('ten');
            $table->string('hinh_anh')->nullable();
            $table->longText('tinh_trang')->nullable();
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
        Schema::dropIfExists('danh_muc_cap_hais');
    }
};
