<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiHinhAnh extends Model
{
    use softDeletes;
    use HasFactory;
    protected $table = 'loai_hinh_anhs';
}
