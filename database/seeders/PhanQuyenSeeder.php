<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhanQuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phan_quyens')->insert(['ten_vai_tro' => 'Admin', 'tinh_trang_vai_tro' => '1', 'tinh_trang' => '0']);
        DB::table('phan_quyens')->insert(['ten_vai_tro' => 'Thành viên', 'tinh_trang_vai_tro' => '2', 'tinh_trang' => '0']);
    }
}