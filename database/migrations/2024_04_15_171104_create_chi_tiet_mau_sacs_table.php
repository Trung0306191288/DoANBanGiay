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
        Schema::create('chi_tiet_mau_sacs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_san_pham')->constrained('san_phams')->nullable();
            $table->foreignId('id_mau_sac')->constrained('mau_sacs')->nullable();
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
        Schema::dropIfExists('chi_tiet_mau_sacs');
    }
};
