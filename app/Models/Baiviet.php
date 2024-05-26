<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Baiviet extends Model
{
    use softDeletes;
    use HasFactory;
    protected $table = 'bai_viets';
}
