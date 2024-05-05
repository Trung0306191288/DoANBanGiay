<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
    use softDeletes;
    use HasFactory;
    protected $table = 'phan_quyens';
}
