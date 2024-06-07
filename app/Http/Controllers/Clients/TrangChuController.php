<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\DanhMucCapMot;
use App\Models\DanhMucCapHai;
use App\Models\LoaiHinhAnh;
use App\Models\ThuongHieu;
use App\Models\Baiviet;
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
        $banners = LoaiHinhAnh::where('loai', 'quangcao')
            ->get()
            ->take(3);

        $banner = LoaiHinhAnh::firstWhere('loai', 'video-slide');
        

        return view('client.index.index', compact('pageName', 'slides', 'banners',));
    }

    public static function news()
    {
        $news = Baiviet::where('loai', 'tin-tuc')
            ->where('tinh_trang', '1')
            ->get()
            ->take(20);

        if (count($news)) {
            return $news;
        } else {
            return false;
        }
    }

    public static function tieuchi()
    {
        $news = Baiviet::where('loai', 'tieu-chi')
            ->where('tinh_trang', '1')
            ->get()
            ->take(20);

        if (count($news)) {
            return $news;
        } else {
            return false;
        }
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
        $khonggian = LoaiHinhAnh::where('loai', 'khong-gian-quan')
            ->get()
            ->sortBy('id');

        if (count($khonggian)) {
            return $khonggian;
        } else {
            return false;
        }
    }

    public static function brand()
    {
        $brand = ThuongHieu::skip(0)
            ->take(8)
            ->get()
            ->sortBy('id');

        if (count($brand)) {
            return $brand;
        } else {
            return false;
        }
    }

    public static function hangmoive()
    {
        $hangmoive = SanPham::skip(0)
            ->where('tinh_trang', '1')
            ->where('hang_moi_ve', '1')
            ->take(50)
            ->get()
            ->sortBy('id');

        if (count($hangmoive)) {
            return $hangmoive;
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

    public static function LayThuongHieu()
    {
        $thuonghieu = ThuongHieu::skip(0)
        ->where('tinh_trang', '1')
            ->take(20)
            ->get()
            ->sortBy('id');

        if (count($thuonghieu)) {
            return $thuonghieu;
        } else {
            return false;
        }
    }

    public static function SanPhamTheoThuongHieu($id_thuong_hieu = 0)
    {
        $products = SanPham::where('id_thuong_hieu', $id_thuong_hieu)
            ->where('tinh_trang', '1')
            ->where('noi_bat', '1')
            ->skip(0)
            ->take(50)
            ->get()
            ->sortBy('id');

        if (count($products)) {
            return $products;
        } else {
            return false;
        }
    }

    public function categoryListPage($name_list, $id_list)
    {
        $pageName = $name_list;
        $products = SanPham::where('id_cap_mot', $id_list)
            ->where('tinh_trang', '1')
            ->paginate(20);

        if (count($products)) {
            $products = $products;
        } else {
            $products = false;
        }

        $cate = DanhMucCapMot::get()->sortBy('id');
        $cate_two = DanhMucCapHai::get()->sortBy('id');
        $brand = ThuongHieu::get()->sortBy('id');
        $cap_2 = 1;
        return view('client.san-pham.index', compact('pageName', 'products', 'cate', 'brand', 'cap_2', 'cate_two'));
    }

    public function categoryCatPage($name_list, $id_list, $name_cat, $id_cat)
    {
        $pageName = $name_cat;
        $products = SanPham::where('id_cap_mot', $id_list)
            ->where('id_cap_hai', $id_cat)
            ->where('tinh_trang', '1')
            ->paginate(20);

        if (count($products)) {
            $products = $products;
        } else {
            $products = false;
        }
        $cap_2 = 2;

        return view('client.san-pham.index', compact('pageName', 'products', 'cap_2'));
    }

    public function timkiemTheoSanPham(Request $data)
    {
        $pageName = 'Tìm kiếm sản phẩm';
        $search = SanPham::where('ten', 'LIKE', '%' . $data->key_search_index . '%')->get();

        if (count($search)) {
            return view('client.san-pham.tim-kiem', compact('search', 'pageName'));
        } else {
            $search = false;
            return view('client.san-pham.tim-kiem', compact('search', 'pageName'));
        }
    }

    public static function policy()
    {
        $policies = Baiviet::where('loai', 'chinh-sach')
            ->where('tinh_trang', '1')
            ->get()
            ->sortBy('id');

        if (count($policies)) {
            return $policies;
        } else {
            return false;
        }
    }

}