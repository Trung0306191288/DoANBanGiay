<?php

namespace App\Http\Controllers;

use App\Models\DanhMucCapMot;
use App\Models\DanhMucCapHai;
use App\Models\Gallerys;
use App\Models\SanPham;
use App\Models\ThuongHieu;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class FunctionsController extends Controller
{
    public function LoadCapMot(Request $data)
    {
        $cate_two = DanhMucCapHai::where('id_cap_mot', $data['id_cap_mot'])->get();
        return $cate_two;
    }

    public function xoaHinhAnhCon(Request $data)
    {
        $product = Gallerys::find($data['id_photo']);
        $abc = public_path('upload/sanham/hinhanhcon/' . $product['hinh_anh']);
        if (file_exists($abc)) {
            unlink($abc);
        }
        $product->delete();
        return $product;
    }

    public function ajax_SearchOrder(Request $data) {
        $order = DonHang::where('status_order',$data['id_status_order'])
        ->join('blogs','orders.payments','=','blogs.id')
        ->select('orders.*', 'blogs.name as name_payments')
        ->get();
        return $order;
    }

    public function ajax_SearchOrder_2(Request $data) {
        $order = DonHang::where('status_payment',$data['id_status_payments'])
        ->join('blogs','orders.payments','=','blogs.id')
        ->select('orders.*', 'blogs.name as name_payments')
        ->get();
        return $order;
    }

    public function ajax_SearchOrder_Price(Request $data) {

        if($data['khoang_gia'] == 1) {
            $order = DonHang::where('total_price','<=','1000000')
            ->join('blogs','orders.payments','=','blogs.id')
            ->select('orders.*', 'blogs.name as name_payments')
            ->get();
        } else if($data['khoang_gia'] == 2) {
            $order = DonHang::where([
                ['total_price','>=','1000000'],
                ['total_price','<=','10000000']
            ])
            ->join('blogs','orders.payments','=','blogs.id')
            ->select('orders.*', 'blogs.name as name_payments')
            ->get();
        } else if($data['khoang_gia'] == 3) {
            $order = DonHang::where([
                ['total_price','>=','1000000'],
                ['total_price','<=','50000000']
            ])
            ->join('blogs','orders.payments','=','blogs.id')
            ->select('orders.*', 'blogs.name as name_payments')
            ->get();
        } else if($data['khoang_gia'] == 4) {
            $order = DonHang::where([
                ['total_price','>=','1000000'],
                ['total_price','<=','100000000']
            ])
            ->join('blogs','orders.payments','=','blogs.id')
            ->select('orders.*', 'blogs.name as name_payments')
            ->get();
        } else if($data['khoang_gia'] == 5) {
            $order = DonHang::where([
                ['total_price','>=','1000000'],
                ['total_price','<=','200000000']
            ])
            ->join('blogs','orders.payments','=','blogs.id')
            ->select('orders.*', 'blogs.name as name_payments')
            ->get();
        } 
        return $order;
    }
}
