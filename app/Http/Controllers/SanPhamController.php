<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\DanhMucCapMot;
use App\Models\ThuongHieu;
use App\Models\MauSac;
use App\Models\Gallerys;
use App\Models\ChiTietMauSac;
use App\Models\ChiTietKichThuoc;
use App\Models\KichThuoc;
use App\Models\DanhMucCapHai;
use App\Models\GiaTheoKichThuoc;
use App\Http\Requests\SanPhamRequest;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function DanhSach()
    {
        $pageName = 'Quản lý Sản Phẩm';
        $products = SanPham::get()->sortBy('id');
        $categorys = DanhMucCapMot::get()->sortBy('id');
        $brands = ThuongHieu::get()->sortBy('id');
        return view('admin.san-pham.danh-sach', compact('products', 'pageName', 'categorys', 'brands'));
    }

    public function themSanPham()
    {
        $pageName = 'Thêm sản phẩm';
        $categorys = DanhMucCapMot::get()->sortBy('id');
        $brands = ThuongHieu::get()->sortBy('id');
        $colors = MauSac::get()->sortBy('id');
        $sizes = KichThuoc::get()->sortBy('id');
        $update = NULL;
        $color_product = NULL;
        $size_product = NULL;
        $list_advanted = NULL;
        return view('admin.san-pham.them', compact('pageName', 'categorys', 'brands', 'update', 'colors', 'sizes', 'color_product', 'size_product', 'list_advanted'));
    }

    public function xulyThemSanPham(SanPhamRequest $data)
    {
        $add = new SanPham;
        if ($data->photo_product != NULL) {
            $images = $data->photo_product;
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('upload/sanpham'), $imageName);
            $add->hinh_anh = $imageName;
        }
        $data->validate(
            [
                'code_product' => 'unique:san_phams,ma_san_pham',
            ],
            [
                'code_product.unique' => 'Tên mã sản phẩm không được giống nhau',
            ]
        );
        $add->ten = $data->name_product;
        $add->mo_ta = $data->desc_product;
        $add->noi_dung = $data->content_product;
        $add->ma_san_pham = $data->code_product;
        $add->gia_ban = $data->price_regular_product;
        $add->gia_moi = $data->price_sale_product;
        $add->gia_dau = $data->price_from_product;
        $add->gia_cuoi = $data->price_to_product;
        // $add->inventory = $data->inventory_product;
        if ($data->status_product != 0) {
            $add->tinh_trang = $data->status_product;
        } else {
            $add->tinh_trang = 0;
        }
        if ($data->status_product_hot != 0) {
            $add->noi_bat = $data->status_product_hot;
        } else {
            $add->noi_bat = 0;
        }
        if ($data->status_product_new != 0) {
            $add->hang_moi_ve = $data->status_product_new;
        } else {
            $add->hang_moi_ve = 0;
        }
        $add->id_cap_mot = $data->cate_product;
        $add->id_cap_hai = $data->cate_two_product;
        $add->id_thuong_hieu = $data->sup_product;
        $add->save();

        if ($data->photo_gallery != NULL) {
            $arr_photo = $data->photo_gallery;
            $count_photo = count($data->photo_gallery);
            for ($i = 0; $i < $count_photo; $i++) {
                $add_Photo = new Gallerys;
                $filename = rand(111111, 999999);
                $images_photo = $arr_photo[$i];
                $imageName_photo =  $filename . '.' . $images_photo->extension();
                $images_photo->move(public_path('upload/sanpham/gallery'), $imageName_photo);
                $add_Photo->id_san_pham = $add->id;
                $add_Photo->hinh_anh = $imageName_photo;
                $add_Photo->loai = 'san-pham';
                $add_Photo->save();
            }
        }

        if ($data->arr_color != NULL) {
            $arr_color = $data->arr_color;
            $count_color = count($data->arr_color);
            for ($i = 0; $i < $count_color; $i++) {
                $add_CP = new ChiTietMauSac;
                $add_CP->id_san_pham = $add->id;
                $add_CP->id_mau_sac = $arr_color[$i];
                $add_CP->save();
            }
        }
        if ($data->arr_size != NULL) {
            $arr_size = $data->arr_size;
            $count_size = count($data->arr_size);
            for ($i = 0; $i < $count_size; $i++) {
                $add_SP_adv = new ChiTietKichThuoc;
                $add_SP_adv->id_san_pham = $add->id;
                $add_SP_adv->id_kich_thuoc = $arr_size[$i];
                $add_SP_adv->save();
                $arr_color_adv = $data->arr_color;
                $count_color_adv = count($data->arr_color ?? []);
                for ($j = 0; $j < $count_color_adv; $j++) {
                    $add_advanted = new GiaTheoKichThuoc;
                    $add_advanted->id_san_pham = $add->id;
                    $add_advanted->id_kich_thuoc = $arr_size[$i];
                    $add_advanted->id_mau_sac = $arr_color_adv[$j];
                    $add_advanted->gia_ban = 0;
                    $add_advanted->gia_moi = 0;
                    $add_advanted->hinh_anh = '';
                    $add_advanted->save();
                }
            }
        }
        return redirect()->route('LayDsSanPham')->with('noti', 'Thêm sản phẩm thành công !!!');
    }

    public function capnhatSanPham($id)
    {
        $pageName = 'Cập nhật sản phẩm';
        $categorys = DanhMucCapMot::get()->sortBy('id');
        $categorys_two = DanhMucCapHai::get()->sortBy('id_cap_mot');
        $brands = ThuongHieu::get()->sortBy('id');
        $colors = MauSac::get()->sortBy('id');
        $sizes = KichThuoc::get()->sortBy('id');
        $color_product = ChiTietMauSac::where('id_san_pham', $id)->pluck('chi_tiet_mau_sacs.id_mau_sac')->toArray();
        $size_product = ChiTietKichThuoc::where('id_san_pham', $id)->pluck('chi_tiet_kich_thuocs.id_kich_thuoc')->toArray();
        $update = SanPham::find($id);
        $categorys_1 = DanhMucCapMot::where('id', $update['id_cap_mot'])->get()->toArray();
        $categorys_2 = DanhMucCapHai::where('id_cap_mot', $categorys_1[0]['id'])->get();
        $photo_gallery = Gallerys::where('id_san_pham', $id)->get()->toArray();
        $list_advanted = GiaTheoKichThuoc::where('id_san_pham', $id)
            ->join('kich_thuocs', 'gia_theo_kich_thuocs.id_kich_thuoc', '=', 'kich_thuocs.id')
            ->join('mau_sacs', 'gia_theo_kich_thuocs.id_mau_sac', '=', 'mau_sacs.id')
            ->select('gia_theo_kich_thuocs.*', 'kich_thuocs.ten', 'mau_sacs.ten as ten_mau')
            ->get()
            ->toArray();

        if ($update == null) {
            return view('LayDsSanPham');
        } else {
            return view('admin.san-pham.them', compact('pageName', 'update', 'categorys_2', 'categorys_two', 'categorys', 'brands', 'colors', 'sizes', 'color_product', 'size_product', 'photo_gallery', 'list_advanted'));
        }
    }

    public function xulyCapNhatSanPham(Request $data, $id)
    {
        $add = SanPham::find($id);
        if ($data->photo_product != NULL) {
            if ($add['hinh_anh'] != NULL) {
                $removeFile = public_path('upload/sanpham/' . $add['hinh_anh']);
                if (file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $images = $data->photo_product;
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('upload/sanpham'), $imageName);
            $add->hinh_anh = $imageName;
        }

        if ($data->photo_gallery != NULL) {
            $arr_photo = $data->photo_gallery;
            $count_photo = count($data->photo_gallery);
            for ($i = 0; $i < $count_photo; $i++) {
                $add_Photo = new Gallerys;
                $filename = rand(111111, 999999);
                $images_photo = $arr_photo[$i];
                $imageName_photo = $filename . '.' . $images_photo->extension();
                $images_photo->move(public_path('upload/sanpham/gallery'), $imageName_photo);
                $add_Photo->id_san_pham = $id;
                $add_Photo->hinh_anh = $imageName_photo;
                $add_Photo->loai = 'san-pham';
                $add_Photo->save();
            }
        }
        $dlt_cp = ChiTietMauSac::where('id_san_pham', $id);
        $dlt_cp->delete();
        $dlt_tras = ChiTietMauSac::withTrashed()->where('id_san_pham', $id);
        $dlt_tras->forceDelete();


        $dlt_sp = ChiTietKichThuoc::where('id_san_pham', $id);
        $dlt_sp->delete();
        $dlt_tras = ChiTietKichThuoc::withTrashed()->where('id_san_pham', $id);
        $dlt_tras->forceDelete();

        if ($data->arr_color != NULL) {
            $arr_color = $data->arr_color;
            $count_color = count($data->arr_color);
            for ($i = 0; $i < $count_color; $i++) {
                $add_CP = new ChiTietMauSac();
                $add_CP->id_san_pham = $id;
                $add_CP->id_mau_sac = $arr_color[$i];
                $add_CP->save();
            }
        }

        if ($data->arr_size != NULL) {
            $arr_size = $data->arr_size;
            $count_size = count($data->arr_size);
            for ($i = 0; $i < $count_size; $i++) {
                $add_SP = new ChiTietKichThuoc();
                $add_SP->id_san_pham = $id;
                $add_SP->id_kich_thuoc = $arr_size[$i];
                $add_SP->save();
                $arr_color_adv = $data->arr_color;
                $count_color_adv = count($data->arr_color ?? []);
                for ($j = 0; $j < $count_color_adv; $j++) {
                    if (GiaTheoKichThuoc::where([
                        ['id_san_pham', '=', $id],
                        ['id_kich_thuoc', '=', $arr_size[$i]],
                        ['id_mau_sac', '=', $arr_color_adv[$j]],
                    ])->get()->toArray() == NULL) {
                        $add_advanted = new GiaTheoKichThuoc;
                        $add_advanted->id_san_pham = $id;
                        $add_advanted->id_kich_thuoc = $arr_size[$i];
                        $add_advanted->id_mau_sac = $arr_color_adv[$j];
                        $add_advanted->gia_ban = 0;
                        $add_advanted->gia_ban = 0;
                        $add_advanted->hinh_anh = '';
                        $add_advanted->kho_hang = '';
                        $add_advanted->save();
                    }
                }
            }
        }

        if ($data->id_adv != NULL) {
            $count_id_adv = count($data->id_adv);
            for ($i = 0; $i < $count_id_adv; $i++) {
                $add_advanted = GiaTheoKichThuoc::where([
                    ['id_san_pham', '=', $id],
                    ['id', '=', $data->id_adv[$i]],
                ])->firstOrFail();
                $add_advanted->gia_ban = $data->price_regular_adv[$i];
                $add_advanted->gia_moi =  $data->price_sale_adv[$i];
                $add_advanted->kho_hang =  $data->inventory[$i];
                $filename_adv = rand(111111, 999999);
                if (isset($data->photo_adv[$i])) {
                    $images_photo_adv = $data->photo_adv[$i];
                    $imageName_photo_adv = $filename_adv . '.' . $images_photo_adv->extension();
                    $images_photo_adv->move(public_path('upload/sanpham/advanted/'), $imageName_photo_adv);
                    $add_advanted->hinh_anh = $imageName_photo_adv;
                }
                $add_advanted->save();
            }
        }
        $add->ten = $data->name_product;
        $add->mo_ta = $data->desc_product;
        $add->noi_dung = $data->content_product;
        $add->ma_san_pham = $data->code_product;
        $add->gia_ban = $data->price_regular_product;
        $add->gia_moi = $data->price_sale_product;
        $add->gia_dau = $data->price_from_product;
        $add->gia_cuoi = $data->price_to_product;
        // $add->inventory = $data->inventory_product;
        if ($data->status_product != 0) {
            $add->tinh_trang = $data->status_product;
        } else {
            $add->tinh_trang = 0;
        }
        if ($data->status_product_hot != 0) {
            $add->noi_bat = $data->status_product_hot;
        } else {
            $add->noi_bat = 0;
        }
        if ($data->status_product_new != 0) {
            $add->hang_moi_ve = $data->status_product_new;
        } else {
            $add->hang_moi_ve = 0;
        }
        $add->id_cap_mot = $data->cate_product;
        $add->id_cap_hai = $data->cate_two_product;
        $add->id_thuong_hieu = $data->sup_product;
        $add->save();

        if ($data->arr_color != NULL && $data->arr_size != NULL) {
            GiaTheoKichThuoc::where('id_san_pham', $id)->whereNotIn('id_mau_sac', $data->arr_color)->delete();
            GiaTheoKichThuoc::where('id_san_pham', $id)->whereNotIn('id_kich_thuoc', $data->arr_size)->delete();
            GiaTheoKichThuoc::withTrashed()->where('id_san_pham', $id)->whereNotIn('id_mau_sac', $data->arr_color)->forceDelete();
            GiaTheoKichThuoc::withTrashed()->where('id_san_pham', $id)->whereNotIn('id_kich_thuoc', $data->arr_size)->forceDelete();
        }
        return redirect()->route('LayDsSanPham')->with('noti', 'Cập nhật sản phẩm thành công !!!');
    }

    public function xoaSanPham($id)
    {
        $dlt = SanPham::find($id);
        $dlt_file = Gallerys::where('loai', 'san-pham')->get()->toArray();
        if ($dlt == null || $dlt->deleted_at != NULL) {
            return view('LayDsSanPham');
        } else {
            if ($dlt['hinh_anh'] != NULL) {
                $removeFile = public_path('upload/products/' . $dlt['hinh_anh']);
                if (file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            if ($dlt_file != NULL) {
                foreach ($dlt_file as $k => $v) {
                    $removeFile_1 = public_path('upload/products/gallery/' . $v['hinh_anh']);
                    if (file_exists($removeFile_1)) {
                        unlink($removeFile_1);
                    }
                }
            }
            $dlt->delete();
            return redirect()->route('LayDsSanPham');
        }
    }

    public function timkiemSanPham(Request $data)
    {
        $pageName = 'Tìm kiếm Sản Phẩm';
        $search = SanPham::where('ten', 'LIKE', '%' . $data->name_search . '%')->get();
        return view('admin.san-pham.tim-kiem', compact('search', 'pageName'));
    }
}
