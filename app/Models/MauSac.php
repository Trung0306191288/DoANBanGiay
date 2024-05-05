<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MauSac extends Model
{
    use softDeletes;
    use HasFactory;
    protected $table = 'mau_sacs';
}
