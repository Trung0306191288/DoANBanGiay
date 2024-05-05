<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DanhMucCapHai extends Model
{
    use softDeletes;
    use HasFactory;
    protected $table = 'danh_muc_cap_hais';
}