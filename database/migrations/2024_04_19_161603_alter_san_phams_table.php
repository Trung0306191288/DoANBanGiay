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
        Schema::table('san_phams', function (Blueprint $table) {
            // Tạo khóa ngoại liên kết đến khóa chính của table danh mục cấp 1 , cấp 2 , thương hiệu
            $table->foreignId('id_cap_mot')->constrained('danh_muc_cap_mots')->nullable();
            $table->foreignId('id_cap_hai')->constrained('danh_muc_cap_hais')->nullable();
            $table->foreignId('id_thuong_hieu')->constrained('thuong_hieus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('san_phams', function (Blueprint $table) {
            $table->dropForeign('san_phams_id_cap_mot_foreign');
            $table->dropForeign('san_phams_id_cap_hai_foreign');
            $table->dropForeign('san_phams_id_thuong_hieu_foreign');
        });
    }
};
