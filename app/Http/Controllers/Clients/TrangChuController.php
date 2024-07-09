<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\DanhMucCapMot;
use App\Models\DanhMucCapHai;
use App\Models\LoaiHinhAnh;
use App\Models\ThuongHieu;
use App\Models\KichThuoc;
use App\Models\MauSac;
use App\Models\Baiviet;
use App\Models\CauHinhChung;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class TrangChuController extends Controller
{
    public function index()
    {
        $TieuDe = 'Trang chủ';
        $slides = LoaiHinhAnh::where('loai', 'slider')
            ->get()
            ->take(10);
        $banners = LoaiHinhAnh::where('loai', 'quangcao')
            ->get()
            ->take(5);

        $banner = LoaiHinhAnh::firstWhere('loai', 'video-slide');
        

        return view('client.index.index', compact('TieuDe', 'slides', 'banners',));
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


    public static function setting()
    {
        $setting = CauHinhChung::select('hotline', 'dien_thoai', 'email', 'dia_chi','zalo','copyright','fanpage','link_map','khoang_gia','khoang_gia_admin')->get();
    
        if ($setting->isNotEmpty()) {
            return $setting;
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
            ->take(5)
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

    public function categoryListPage(Request $request, $name_list, $id_list)
    {
        $TieuDe = $name_list;
    
        $query = SanPham::where('id_cap_mot', $id_list)
                        ->where('tinh_trang', '1');
    
        if ($request->has('kichthuoc')) {
            $sizes = explode(',', $request->input('kichthuoc'));
            $query->whereHas('sizes', function ($q) use ($sizes) {
                $q->whereIn('kich_thuocs.id', $sizes)
                  ->whereNull('kich_thuocs.deleted_at');
            });
        }
    
        if ($request->has('mausac')) {
            $colors = explode(',', $request->input('mausac'));
            $query->whereHas('colors', function ($q) use ($colors) {
                $q->whereIn('mau_sacs.id', $colors)
                  ->whereNull('mau_sacs.deleted_at');
            });
        }

        if ($request->has('thuonghieu')) {
            $brands = explode(',', $request->input('thuonghieu'));
            $query->whereHas('brandPro', function ($q) use ($brands) {
                $q->whereIn('thuong_hieus.id', $brands)
                  ->whereNull('thuong_hieus.deleted_at');
            });
        }
    
        if ($request->has('khoanggia')) {
            [$minPrice, $maxPrice] = explode('-', $request->input('khoanggia'));
            $query->whereBetween('gia_ban', [(float) $minPrice, (float) $maxPrice]);
        }
    
        $query->whereNull('deleted_at');
    
        // Xuất dữ liệu sản phẩm đã lọc
        $products = $query->paginate(20);
    
        // Query lấy dữ liệu
        $cate = DanhMucCapMot::orderBy('id')->get();
        $cate_two = DanhMucCapHai::orderBy('id')->get();
        $brand_pro = ThuongHieu::orderBy('id')->get();
        $size_pro = KichThuoc::orderBy('id')->get();
        $color_pro = MauSac::orderBy('id')->get();
        $cap_2 = 1;
    
        // Return view with the data
        return view('client.san-pham.index', compact('TieuDe', 'products', 'cate', 'brand_pro', 'cap_2', 'cate_two', 'size_pro', 'color_pro'));
    }
    
    public function categoryCatPage(Request $request, $name_list, $id_list, $name_cat, $id_cat)
    {
        $TieuDe = $name_cat;

        $query = SanPham::where('id_cap_mot', $id_list)
                        ->where('tinh_trang', '1');

        $query = SanPham::where('id_cap_mot', $id_list)
            ->where('id_cap_hai', $id_cat)
            ->where('tinh_trang', '1');
           
    
        if ($request->has('kichthuoc')) {
            $sizes = explode(',', $request->input('kichthuoc'));
            $query->whereHas('sizes', function ($q) use ($sizes) {
                $q->whereIn('kich_thuocs.id', $sizes)
                    ->whereNull('kich_thuocs.deleted_at');
            });
        }
    
        if ($request->has('mausac')) {
            $colors = explode(',', $request->input('mausac'));
            $query->whereHas('colors', function ($q) use ($colors) {
                $q->whereIn('mau_sacs.id', $colors)
                    ->whereNull('mau_sacs.deleted_at');
            });
        }

        if ($request->has('thuonghieu')) {
            $brands = explode(',', $request->input('thuonghieu'));
            $query->whereHas('brandPro', function ($q) use ($brands) {
                $q->whereIn('thuong_hieus.id', $brands)
                    ->whereNull('thuong_hieus.deleted_at');
            });
        }
    
        if ($request->has('khoanggia')) {
            [$minPrice, $maxPrice] = explode('-', $request->input('khoanggia'));
            $query->whereBetween('gia_ban', [(float) $minPrice, (float) $maxPrice]);
        }
    
        $query->whereNull('deleted_at');
    
        $products = $query->paginate(20);
        $brand_pro = ThuongHieu::orderBy('id')->get();
        $size_pro = KichThuoc::orderBy('id')->get();
        $color_pro = MauSac::orderBy('id')->get();
        $cap_2 = 2;
    
        return view('client.san-pham.index', compact('TieuDe', 'products', 'cap_2','brand_pro','size_pro', 'color_pro'));
    }

    public function timkiemTheoSanPham(Request $request)
    {
        $TieuDe = 'Tìm kiếm sản phẩm';
        $key = $request->input('key_search_index');

        $search = SanPham::where('ten', 'LIKE', '%' . $key . '%')->get();

        if ($request->ajax()) {
            return view('client.san-pham.goi-y', compact('search'))->render();
        }

        return view('client.san-pham.tim-kiem', compact('search', 'TieuDe'));
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

    public static function donhangao()
    {
        $donhangao = ChiTietDonHang::orderBy('id')->get();
        return $donhangao;
    }

    public static function thongtinnguoidung()
    {
        $thongtinnguoidung = DonHang::where('tinh_trang_hinh_thuc', 'Đã thanh toán')
            ->where('tinh_trang_don_hang', 'Đã giao')
            ->orderBy('id')
            ->get();
        return $thongtinnguoidung;
    }
    
    

}