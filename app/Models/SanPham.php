<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use softDeletes;
    use HasFactory;
    protected $fillable = [
        'id_cap_mot',
        'id_cap_hai',
        'id_thuong_hieu',
        'ten',
        'mo_ta',
        'noi_dung',
        'gia_ban',
        'gia_moi',
        'ma_san_pham',
        'hinh_anh',
        'tinh_trang',
        'noi_bat',
        'hang_moi_ve'
    ];

    public function danhMucCapMot()
    {
        return $this->belongsTo(DanhMucCapMot::class, 'id_cap_mot');
    }

    public function danhMucCapHai()
    {
        return $this->belongsTo(DanhMucCapHai::class, 'id_cap_hai');
    }

    public function thuongHieu()
    {
        return $this->belongsTo(ThuongHieu::class, 'id_thuong_hieu');
    }

    public function sizes()
    {
        return $this->belongsToMany(KichThuoc::class, 'chi_tiet_kich_thuocs', 'id_san_pham', 'id_kich_thuoc');
    }

    public function colors()
    {
        return $this->belongsToMany(MauSac::class, 'chi_tiet_mau_sacs', 'id_san_pham', 'id_mau_sac');
    }

    public function brandPro()
    {
        return $this->belongsTo(ThuongHieu::class, 'id_thuong_hieu');
    }
}