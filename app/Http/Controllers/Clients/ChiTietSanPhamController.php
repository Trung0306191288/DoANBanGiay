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
        $sizeName = null;
        $clrName = null;
        for ($i = 0; $i < count($clrProduct); $i++) {
            $clrName[$i] = MauSac::where('id', $clrProduct[$i]['id_mau_sac'])
                ->select('id', 'ten','code_mau')
                ->get();
        }
        for ($i = 0; $i < count($sizeProduct); $i++) {
            $sizeName[$i] = KichThuoc::where('id', $sizeProduct[$i]['id_kich_thuoc'])
                ->select('id', 'ten')
                ->get();
        }

        $productPhotoChild = Gallerys::where('id_san_pham', $id)
            ->get();
        $productDetail = SanPham::where('id', $id)
            ->where('tinh_trang', '1')
            ->first();
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

        return view('client.san-pham.chi-tiet', compact('TieuDe', 'productDetail', 'clrName', 'sizeName', 'productPhotoChild', 'productBrand', 'productsRelated'));
    }

    public function loadPrice(Request $data)
    {
        $productPrice = GiaTheoKichThuoc::where('id_san_pham', $data['idPrd'])
            ->where('id_kich_thuoc', $data['idSize'])
            ->where('id_mau_sac', $data['idColor'])
            ->select('gia_moi', 'gia_ban', 'kho_hang')
            ->get();

        return response()->json(array([
            'priceNew' => $productPrice[0]['gia_moi'],
            'priceOld' => $productPrice[0]['gia_ban'],
            'inventory' => $productPrice[0]['kho_hang'],
        ]), 200);
    }
}
