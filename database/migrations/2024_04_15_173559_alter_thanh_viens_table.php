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
        Schema::table('thanh_viens', function (Blueprint $table) {
            // // Tạo khóa ngoại liên kết đến khóa chính của table Phần Quyền
            $table->foreignId('id_phan_quyen')->constrained('phan_quyens')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thanh_viens', function (Blueprint $table) {
            $table->dropForeign('thanh_viens_id_phan_quyen_foreign');
        });
    }
};
