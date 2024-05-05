<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\DanhMucCapMot;
use App\Models\DanhMucCapHai;
use App\Models\Brand;
use App\Models\LoaiHinhAnh;
use App\Models\ThuongHieu;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class TrangChuController extends Controller
{
    public function index()
    {
        $pageName = 'Trang chủ';
        $slides = LoaiHinhAnh::where('loai', 'slider')
            ->get()
            ->take(10);
        $banners = LoaiHinhAnh::where('loai', 'advertisement')
            ->get()
            ->take(3);

        $banner = LoaiHinhAnh::firstWhere('loai', 'video-slide');

        return view('client.index.index', compact('pageName', 'slides', 'banners'));
    }

    public static function logo()
    {
        $logo = LoaiHinhAnh::firstWhere('loai', 'logo');

        if (!empty($logo)) {
            return $logo;
        } else {
            return false;
        }
    }

    public static function banner()
    {
        $banner = LoaiHinhAnh::firstWhere('loai', 'banner');

        if (!empty($banner)) {
            return $banner;
        } else {
            return false;
        }
    }

    public static function video()
    {
        $video = LoaiHinhAnh::firstWhere('loai', 'video-slide');

        if (!empty($video)) {
            return $video;
        } else {
            return false;
        }
    }

    public static function loadLevel1Cate()
    {
        $categories = DanhMucCapMot::skip(0)
            ->take(12)
            ->get()
            ->sortBy('id');

        if (count($categories)) {
            return $categories;
        } else {
            return false;
        }
    }

    public static function loadLevel2Cate($id_list = 0)
    {
        $categories_cat = DanhMucCapHai::where('id_cap_mot', $id_list)
            ->where('tinh_trang', '1')
            ->skip(0)
            ->take(5)
            ->get()
            ->sortBy('id');

        if (count($categories_cat)) {
            return $categories_cat;
        } else {
            return false;
        }
    }


    public static function social()
    {
        $socials = LoaiHinhAnh::where('loai', 'social')
            ->get()
            ->sortBy('id');

        if (count($socials)) {
            return $socials;
        } else {
            return false;
        }
    }

    public static function quangcao()
    {
        $quangcao = LoaiHinhAnh::where('loai', 'quang-cao')
            ->get()
            ->sortBy('id');

        if (count($quangcao)) {
            return $quangcao;
        } else {
            return false;
        }
    }

    public static function khonggianquan()
    {
        $quangcao = LoaiHinhAnh::where('loai', 'quang-cao')
            ->get()
            ->sortBy('id');

        if (count($quangcao)) {
            return $quangcao;
        } else {
            return false;
        }
    }

    public static function brand()
    {
        $brand = ThuongHieu::skip(0)
            ->take(12)
            ->get()
            ->sortBy('id');

        if (count($brand)) {
            return $brand;
        } else {
            return false;
        }
    }

    
}