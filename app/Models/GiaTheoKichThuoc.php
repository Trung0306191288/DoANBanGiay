<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiaTheoKichThuoc extends Model
{
    use softDeletes;
    use HasFactory;
    protected $table = 'gia_theo_kich_thuocs';
}
