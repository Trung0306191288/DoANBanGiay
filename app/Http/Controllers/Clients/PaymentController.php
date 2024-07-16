<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\Baiviet;
use App\Models\ChiTietDonHang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
    public function vnpay_payment(Request $request)
    {
        // dd($request->all());
        $code = Str::random(8);
        // Sanitize and validate input
        $request->validate([
            'total' => 'required|numeric|min:1',
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $cart = session('cart', []);
        $orderInfo = new DonHang;
        $total = 0;

        foreach ($cart as $details) {
            $price = $details['price_new'] ?? $details['price_old'];
            $total += $price * $details['quantity'];
        }

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

        foreach ($cart as $details) {
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

        if ($request->has('redirect')) {
            // VNPay payment logic
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = route('vnpay.return');
            $vnp_TmnCode = 'MS8C8LUC';
            $vnp_HashSecret = 'NP5Q5W6E02IBDKYDJ4P3NDGLSY2SHEVP';
            $vnp_OrderInfo = "Thanh toán hóa đơn";
            $vnp_OrderType = "Chuyên bán giày hiệu sài gòn";
            $vnp_Amount = $request->total * 100;
            $vnp_Locale = "VN";
            $vnp_BankCode = "NCB";
            $vnp_IpAddr = $request->ip();

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => now()->format('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $code,
            );

            if (!empty($vnp_BankCode)) {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            $query = "";
            $hashdata = "";
            $i = 0;
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (!empty($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

            return redirect($vnp_Url);
        }

        return redirect()->route('orderInfo', $orderInfo->id);
    }

    public function return(Request $request)
    {
        // if (!Auth::guard('client')->check()) {
        //     return redirect()->route('user.login');
        // }
        if($request->vnp_ResponseCode == "00") {
            
            session()->forget('cart');
            // return redirect()->route('orderInfo', $request->vnp_TxnRef); 
            return redirect()->route('TrangChu'); 

        }
        dd('Lỗi thanh toán phí dịch vụ');
    }

}
