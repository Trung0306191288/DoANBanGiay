<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ThanhVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thanh_viens')->insert(['id_phan_quyen' => '1','ho_ten' => 'Trần Quốc Trung', 'username' => 'Admin', 'password' => Hash::make('123456'), 'tinh_trang' => '1', 'vai_tro' => '0']);
    }
}
