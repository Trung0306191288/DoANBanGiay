<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ChiTietMauSac extends Model
{
    use softDeletes;
    use HasFactory;
    protected $table = 'chi_tiet_mau_sacs';
}
