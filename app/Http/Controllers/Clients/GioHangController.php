<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;    
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SanPham;
use App\Models\KichThuoc;
use App\Models\MauSac;
use App\Models\GiaTheoKichThuoc;
use App\Models\Baiviet;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;

class GioHangController extends Controller
{
    public function cart()
    {
        $TieuDe = "Giỏ hàng";
        $code = Str::random(8);
        $payments = Baiviet::where('loai', 'payments')
            ->where('tinh_trang', '1')
            ->get();
        return view('client.cart.cart', compact('TieuDe', 'code', 'payments'));
    }

    public function addToCart(Request $request)
    {
        $id = $request['id'] . '-' . $request['idSize'] . '-' . $request['idColor'];
        $product = SanPham::findOrFail($request['id']);
        $productSizeColorPhoto = GiaTheoKichThuoc::where('id_san_pham', $request['id'])
            ->where('id_kich_thuoc', $request['idSize'])
            ->where('id_mau_sac', $request['idColor'])
            ->first();
        $size = KichThuoc::where('id', $request['idSize'])->first();
        $color = MauSac::where('id', $request['idColor'])->first();

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id_product' => $product->id,
                'name' => $product->ten,
                'sizeName' => $size->ten,
                'colorName' => $color->ten,
                'quantity' => $request['quantity'],
                'price_new' => $productSizeColorPhoto->gia_moi,
                'price_old' => $productSizeColorPhoto->gia_ban,
                'photo' => $product->hinh_anh,
                'inventory' => $productSizeColorPhoto->kho_hang,
            ];
        }

        session()->put('cart', $cart);
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            // session()->flash('success', 'Cập nhật giỏ hàng thành công!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            // session()->flash('success', 'Đã xóa sản phẩm!');
        }
    }

    public function payment(Request $request)
    {
        $cart = session('cart', []); // Ensure $cart is an array even if session('cart') is null
        $orderInfo = new DonHang;
        $total = 0;

        foreach ($cart as $id => $details) {
            $price = $details['price_new'] ?? $details['price_old'];
            $total += $price * $details['quantity'];
        }

        // $orderInfo->id_thanh_vien = Auth::guard('client')->user()->id;
        $orderInfo->ma_don_hang = $request->code;
        $orderInfo->ho_ten = $request->name;
        $orderInfo->dien_thoai = $request->phone;
        $orderInfo->email = $request->email;
        $orderInfo->dia_chi = $request->address;
        $orderInfo->ghi_chu = $request->note;
        $orderInfo->tong_gia = $total;
        $orderInfo->hinh_thuc_thanh_toan = $request->payment_method;
        $orderInfo->tinh_trang_don_hang = 'Chờ xác nhận';
        $orderInfo->tinh_trang_hinh_thuc = 'Chưa thanh toán';
        $orderInfo->save();

        foreach ($cart as $id => $details) {
            $orderDetail = new ChiTietDonHang();
            // $product = Product::find($details['id_product']);
            // $product->inventory -= $details['quantity']);
            // $product->save();

            $orderDetail->id_don_hang = $orderInfo->id;
            $orderDetail->id_san_pham = $details['id_product'];
            $orderDetail->dia_chi = '';
            $orderDetail->ghi_chu = '';
            $orderDetail->tong_gia = 0;

            $orderDetail->gia_ban = $details['price_old'];
            $orderDetail->gia_moi = $details['price_new'] ?? 0;

            $orderDetail->hinh_anh = $details['photo'];
            $orderDetail->ten_san_pham = $details['name'];
            $orderDetail->ten_kich_thuoc = $details['sizeName'];
            $orderDetail->ten_mau_sac = $details['colorName'];
            $orderDetail->so_luong = $details['quantity'];
            $orderDetail->save();
        }

        session()->forget('cart');

        return redirect()->route('orderInfo', $orderInfo->id);
    }




    public function orderInfo($id)
    {
        $TieuDe = "Thông tin đơn hàng của bạn";
        $orderInfo = DonHang::where('id', $id)
            ->first();
        $orderDetail = ChiTietDonHang::where('id_don_hang', $id)
            ->get();
        $paymentMethod = $orderInfo->hinh_thuc_thanh_toan ?? 'Thanh toán Vnpay';

        // Retrieve the payment method details
        $payment = Baiviet::where('loai', 'payments')
                    ->where('id', $paymentMethod)
                    ->first();


        return view('client.cart.index', compact('TieuDe', 'orderInfo', 'orderDetail', 'payment'));
    }
}
