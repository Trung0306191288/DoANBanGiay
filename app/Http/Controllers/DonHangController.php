<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\KichThuoc;
use App\Models\MauSac;
use App\Models\ChiTietKichThuoc;
use App\Models\ChiTietMauSac;
use App\Models\GiaTheoKichThuoc;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use App\Models\Baiviet;

class DonHangController extends Controller
{
    public function DanhSach()
    {
        $TieuDe = 'Quản lý đơn hàng';
        $orders = DonHang::get()->sortBy('id');
        return view('admin.don-hang.danh-sach', compact('orders', 'TieuDe'));
    }

    public function loadDonHang($id)
    {
        $orderInfo = DonHang::find($id);
        $orderDetails = ChiTietDonHang::where('id_don_hang', $id)
            ->get();
        $TieuDe = 'Xem đơn hàng ' . $orderInfo->ma_don_hang;

        return view('admin.don-hang.chi-tiet-don-hang', compact('orderInfo', 'orderDetails', 'TieuDe'));
    }

    public function capnhatDonHang(Request $data, $id)
    {
        $update = DonHang::find($id);
        $orderDetails = ChiTietDonHang::where('id_don_hang', $id)->get();
        $return = false;

        if ($data->status_payment == 'Đã thanh toán' || $update->status_payment == 'Đã thanh toán') {
            if ($data->status_order == 'Đã hủy') {
                for ($i = 0; $i < count($orderDetails); $i++) {
                    $product = SanPham::where('id', $orderDetails[$i]['id_san_pham'])->select('id')->first();
                    $idColor = MauSac::where('ten', $orderDetails[$i]['ten_mau_sac'])->select('id')->first();
                    $idSize = KichThuoc::where('ten', $orderDetails[$i]['ten_kich_thuoc'])->select('id')->first();
                    $inventory = GiaTheoKichThuoc::where('id_san_pham', $product->id)
                        ->where('id_kich_thuoc', $idSize->id)->where('id_mau_sac', $idColor->id)->first();
                    (int)$inventory->kho_hang = $inventory->kho_hang + $orderDetails[$i]['so_luong'];
                    $inventory->save();
                }
                $return = true;
            }
            for ($i = 0; $i < count($orderDetails); $i++) {
                if ($return == true) break;
                $product = SanPham::where('id', $orderDetails[$i]['id_san_pham'])->select('id')->first();
                $idColor = MauSac::where('ten', $orderDetails[$i]['ten_mau_sac'])->select('id')->first();
                $idSize = KichThuoc::where('ten', $orderDetails[$i]['ten_kich_thuoc'])->select('id')->first();
                $inventory = GiaTheoKichThuoc::where('id_san_pham', $product->id)
                    ->where('id_kich_thuoc', $idSize->id)->where('id_mau_sac', $idColor->id)->first();
                (int)$inventory->kho_hang = $inventory->kho_hang - $orderDetails[$i]['so_luong'];
                $inventory->save();
            }
        }

        $update->ho_ten = $data->name;
        $update->dien_thoai = $data->phone;
        $update->dia_chi = $data->address;
        $update->email = $data->email;
        $update->ghi_chu = $data->note;
        if ($update->tinh_trang_don_hang != 'Đã hủy') {
            $update->tinh_trang_don_hang = $data->status_order;
        }
        if ($update->tinh_trang_hinh_thuc != 'Đã thanh toán') {
            $update->tinh_trang_hinh_thuc = $data->status_payment;
        }
        $update->save();
        return redirect()->route('LayDsDonHang');
    }

    public function xoaDonHang($id)
    {
        $dlt = DonHang::find($id);
        $orderDetails = ChiTietDonHang::where('id_don_hang', $id)
            ->get();

        if ($dlt == null || $dlt->deleted_at != NULL) {
            return redirect()->route('LayDsDonHang');
        } else {
            for ($i = 0; $i < count($orderDetails); $i++) {
                $orderDetails[$i]->delete();
            }
            $dlt->delete();
            return redirect()->route('LayDsDonHang');
        }
    }

    public static function orderPayments($id)
    {
        $orderPayment = Baiviet::where('id', $id)
            ->where('loai', 'payments')
            ->first();

        if (!empty($orderPayment)) {
            return $orderPayment;
        } else {
            return false;
        }
    }

    public static function productDetails($id)
    {
        $productDetails = SanPham::where('id', $id)
            ->first();

        if (!empty($productDetails)) {
            return $productDetails;
        } else {
            return false;
        }
    }

    public static function timkiemDonHang(Request $data)
    {
        $TieuDe = 'Tìm kiếm đơn hàng';
    
        if ($data->select_status_order == NULL) {
            $status_info = 'Không';
        } else {
            $status_info = $data->select_status_order;
        }

        if ($data->select_status_payments == NULL) {
            $status_info_pay = 'Không';
        } else {
            $status_info_pay = $data->select_status_payments;
        }
        $giadau = $data->input('giadau', 0); // Mặc định là 0 nếu không có giá trị
        $giacuoi = $data->input('giacuoi', PHP_INT_MAX); // Mặc định là giá trị lớn nhất của PHP

        if ($data->select_status_order != NULL && $data->select_status_payments == NULL) {
            $search = DonHang::where('tinh_trang_don_hang', $data->select_status_order)->get();

        } else if ($data->select_status_order == NULL && $data->select_status_payments != NULL ) { 
            $search = DonHang::where('tinh_trang_hinh_thuc', $data->select_status_order)->get();

        }  else if ($data->select_status_order == NULL && $data->select_status_payments == NULL && isset($data->giadau) && isset($data->giacuoi)) {
            $giadau = $data->input('giadau', 0);
            $giacuoi = $data->input('giacuoi', PHP_INT_MAX);

            $search = DonHang::whereBetween('tong_gia', [$giadau, $giacuoi])
                ->get();
        }  else if ($data->select_status_order != NULL && $data->select_status_payments != NULL && isset($data->giadau) && isset($data->giacuoi)) { 
            $giadau = $data->input('giadau', 0);
            $giacuoi = $data->input('giacuoi', PHP_INT_MAX);

            $search = DonHang::whereBetween('tong_gia', [$giadau, $giacuoi])
                ->where('tinh_trang_don_hang', $data->select_status_order)
                ->where('tinh_trang_hinh_thuc', $data->select_status_payments)
                ->get();
        }
        
        $name_search = 'Trạng thái đơn hàng: ' . $status_info . ', Trạng thái thanh toán: ' . $status_info_pay . ', Giá đầu: ' . $giadau . ', Giá cuối: ' . $giacuoi;
       
        return view('admin.don-hang.tim-kiem', compact('search', 'TieuDe', 'name_search'));
    }
}
