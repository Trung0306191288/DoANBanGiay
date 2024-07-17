<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\ThuongHieu;
use App\Models\KichThuoc;
use App\Models\MauSac;
use App\Models\ChiTietMauSac;
use App\Models\ChiTietKichThuoc;
use App\Models\GiaTheoKichThuoc;
use App\Models\BaiViet;
use App\Models\Gallerys;

class ChiTietSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $TieuDe = 'Chi tiết sản phẩm';
        $clrProduct = ChiTietMauSac::where('id_san_pham', $id)->get('id_mau_sac');
        $sizeProduct = ChiTietKichThuoc::where('id_san_pham', $id)->get('id_kich_thuoc');
        $sizeName = [];
        $clrName = [];
        $priceData = [];
    
        foreach ($clrProduct as $clr) {
            $clrName[] = MauSac::where('id', $clr['id_mau_sac'])
                ->select('id', 'ten', 'code_mau')
                ->first();
        }
    
        foreach ($sizeProduct as $size) {
            $sizeName[] = KichThuoc::where('id', $size['id_kich_thuoc'])
                ->select('id', 'ten')
                ->first();
        }
    
        $productPhotoChild = Gallerys::where('id_san_pham', $id)->get();
        $productDetail = SanPham::where('id', $id)->where('tinh_trang', '1')->first();
        if ($productDetail) {
            $productBrand = ThuongHieu::where('id', $productDetail['id_thuong_hieu'] ?? null)->first();
        } else {
            $productDetail = false;
            $productBrand = null;
        }
        $productsRelated = SanPham::whereNotIn('id', [$id, $id])
            ->where('id_cap_mot', $productDetail['id_cap_mot'])
            ->where('id_cap_hai', $productDetail['id_cap_hai'])
            ->take(10)
            ->get();
    
        if (!empty($productDetail)) {
            $productDetail = $productDetail;
        } else {
            $productDetail = false;
        }
    
        // Get all price data
        $priceEntries = GiaTheoKichThuoc::where('id_san_pham', $id)->get();
        foreach ($priceEntries as $entry) {
            $priceData[$entry['id_kich_thuoc']][$entry['id_mau_sac']] = [
                'gia_moi' => $entry['gia_moi'],
                'gia_ban' => $entry['gia_ban'],
                'kho_hang' => $entry['kho_hang']
            ];
        }
    
        return view('client.san-pham.chi-tiet', compact('TieuDe', 'productDetail', 'clrName', 'sizeName', 'productPhotoChild', 'productBrand', 'productsRelated', 'priceData'));
    }
    

}
