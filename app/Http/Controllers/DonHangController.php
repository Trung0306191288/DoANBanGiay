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
use App\Models\BaiViet;

class DonHangController extends Controller
{
    public function DanhSach()
    {
        $pageName = 'Quản lý đơn hàng';
        $orders = DonHang::get()->sortBy('id');
        return view('admin.don-hang.danh-sach', compact('orders', 'pageName'));
    }

    public function loadDonHang($id)
    {
        $orderInfo = DonHang::find($id);
        $orderDetails = ChiTietDonHang::where('id_don_hang', $id)
            ->get();
        $pageName = 'Xem đơn hàng ' . $orderInfo->ma_don_hang;

        return view('admin.don-hang.chi-tiet-don-hang', compact('orderInfo', 'orderDetails', 'pageName'));
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
                    (int)$inventory->inventory = $inventory->inventory + $orderDetails[$i]['so_luong'];
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
                (int)$inventory->inventory = $inventory->inventory - $orderDetails[$i]['so_luong'];
                $inventory->save();
            }
        }

        $update->ten = $data->name;
        $update->dien_thoai = $data->phone;
        $update->dia_chi = $data->address;
        $update->email = $data->email;
        $update->ghi_chu = $data->note;
        if ($update->tinh_trang_don_hang != 'Đã hủy') {
            $update->tinh_trang_don_hang = $data->tinh_trang_don_hang;
        }
        if ($update->tinh_trang_hinh_thuc != 'Đã thanh toán') {
            $update->tinh_trang_hinh_thuc = $data->tinh_trang_hinh_thuc;
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

    // public static function orderPayments($id)
    // {
    //     $orderPayment = BaiViet::where('id', $id)
    //         ->where('type', 'payments')
    //         ->first();

    //     if (!empty($orderPayment)) {
    //         return $orderPayment;
    //     } else {
    //         return false;
    //     }
    // }

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
        $pageName = 'Tìm kiếm đơn hàng';
        $price_info = '';
        if ($data->price_search == 1) {
            $price_info = 'nhỏ hơn 1 triệu.';
        } else if ($data->price_search == 2) {
            $price_info = 'nhỏ hơn 10 triệu.';
        } else if ($data->price_search == 3) {
            $price_info = 'nhỏ hơn 50 triệu.';
        } else if ($data->price_search == 4) {
            $price_info = 'nhỏ hơn 100 triệu.';
        } else if ($data->price_search == 5) {
            $price_info = 'nhỏ hơn 200 triệu.';
        }

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

        $name_search = 'Trạng thái đơn hàng: ' . $status_info . ', Trạng thài thanh toán: ' . $status_info_pay . ', Giá trị: ' . $price_info;
        if ($data->select_status_order != NULL && $data->select_status_payments == NULL && $data->price_search == 3) {
            $search = DonHang::where('status_order', $data->select_status_order)->get();
        } else if ($data->select_status_order == NULL && $data->select_status_payments != NULL && $data->price_search == 3) {
            $search = DonHang::where('status_payment', $data->select_status_payments)->get();
        } else if ($data->select_status_order == NULL && $data->select_status_payments == NULL && $data->price_search == 3) {
            $search = DonHang::where([
                ['total_price', '>=', '1000000'],
                ['total_price', '<=', '50000000']
            ])->get();
        } else if ($data->select_status_order != NULL && $data->select_status_payments != NULL && $data->price_search == 3) {
            $search = DonHang::where([
                ['status_order', $data->select_status_order],
                ['status_payment', $data->select_status_payments],
                ['total_price', '>=', '1000000'],
                ['total_price', '<=', '50000000']
            ])->get();
        } else if ($data->select_status_order == NULL && $data->select_status_payments != NULL && $data->price_search == 3) {
            $search = DonHang::where([
                ['status_payment', $data->select_status_payments],
                ['total_price', '>=', '1000000'],
                ['total_price', '<=', '50000000']
            ])->get();
        } else if ($data->select_status_order != NULL && $data->select_status_payments == NULL && $data->price_search == 3) {
            $search = DonHang::where([
                ['status_order', $data->select_status_order],
                ['total_price', '>=', '1000000'],
                ['total_price', '<=', '50000000']
            ])->get();
        } else if ($data->select_status_order != NULL && $data->select_status_payments != NULL && $data->price_search != NULL && $data->price_search != 3) {
            if ($data['price_search'] == 1) {
                $search = DonHang::where([
                    ['status_order', $data->select_status_order],
                    ['status_payment', $data->select_status_payments],
                    ['total_price', '<=', '1000000']
                ])->get();
            } else if ($data['price_search'] == 2) {
                $search = DonHang::where([
                    ['status_order', $data->select_status_order],
                    ['status_payment', $data->select_status_payments],
                    ['total_price', '>=', '1000000'],
                    ['total_price', '<=', '10000000']
                ])->get();
            } else if ($data['price_search'] == 3) {
                $search = DonHang::where([
                    ['status_order', $data->select_status_order],
                    ['status_payment', $data->select_status_payments],
                    ['total_price', '>=', '1000000'],
                    ['total_price', '<=', '50000000']
                ])->get();
            } else if ($data['price_search'] == 4) {
                $search = DonHang::where([
                    ['status_order', $data->select_status_order],
                    ['status_payment', $data->select_status_payments],
                    ['total_price', '>=', '1000000'],
                    ['total_price', '<=', '100000000']
                ])->get();
            } else if ($data['price_search'] == 5) {
                $search = DonHang::where([
                    ['status_order', $data->select_status_order],
                    ['status_payment', $data->select_status_payments],
                    ['total_price', '>=', '1000000'],
                    ['total_price', '<=', '200000000']
                ])->get();
            }
        }
        return view('admin.don-hang.tim-kiem', compact('search', 'pageName', 'name_search'));
    }
}
