<?php

namespace App\Http\Controllers;

use App\Models\DanhMucCapMot;
use App\Models\DanhMucCapHai;
use App\Models\Gallerys;
use App\Models\SanPham;
use App\Models\ThuongHieu;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class FunctionsController extends Controller
{
    public function LoadCapMot(Request $data)
    {
        $cate_two = DanhMucCapHai::where('id_cap_mot', $data['id_cap_mot'])->get();
        return $cate_two;
    }

    public function xoaHinhAnhCon(Request $data)
    {
        $product = Gallerys::find($data['id_photo']);
        $abc = public_path('upload/sanham/hinhanhcon/' . $product['hinh_anh']);
        if (file_exists($abc)) {
            unlink($abc);
        }
        $product->delete();
        return $product;
    }
}
