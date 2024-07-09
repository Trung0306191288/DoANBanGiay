<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThuongHieu;
use App\Models\SanPham;
use App\Models\KichThuoc;
use App\Models\MauSac;



class ChiTietThuongHieuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TieuDe = 'Thương hiệu';
        $brandList = ThuongHieu::skip(0)
        ->paginate(20);

        return view('client.thuong-hieu.index', compact('TieuDe', 'brandList'));
    }

    public function detail(Request $request, $name_list, $id_brand)
    {
        $TieuDe = $name_list;
    
        $query = SanPham::where('id_thuong_hieu', $id_brand)
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

        if ($request->has('khoanggia')) {
            [$minPrice, $maxPrice] = explode('-', $request->input('khoanggia'));
            $query->whereBetween('gia_ban', [(float) $minPrice, (float) $maxPrice]);
        }
    
        $query->whereNull('deleted_at');
    
        // Xuất dữ liệu sản phẩm đã lọc
        $products = $query->paginate(20);
    
        // Query lấy dữ liệu
        $size_pro = KichThuoc::orderBy('id')->get();
        $color_pro = MauSac::orderBy('id')->get();


        return view('client.thuong-hieu.detail', compact('TieuDe', 'products','size_pro', 'color_pro'));
    }
}
