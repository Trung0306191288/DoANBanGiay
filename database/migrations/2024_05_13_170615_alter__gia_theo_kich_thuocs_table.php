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
        Schema::table('gia_theo_kich_thuocs', function (Blueprint $table) {
            $table->foreignId('id_san_pham')->constrained('san_phams')->nullable();
            $table->foreignId('id_kich_thuoc')->constrained('kich_thuocs')->nullable();
            $table->foreignId('id_mau_sac')->constrained('mau_sacs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gia_theo_kich_thuocs', function (Blueprint $table) {
            $table->dropForeign('gia_theo_kich_thuocs_id_san_pham_foreign');
            $table->dropForeign('gia_theo_kich_thuocs_id_kich_thuoc_foreign');
            $table->dropForeign('gia_theo_kich_thuocs_id_mau_sac_foreign');
        });
    }
};
