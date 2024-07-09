<?php

namespace App\Http\Controllers;

use App\Models\CauHinhChung;
use App\Http\Requests\CauHinhChungRequest;
use Illuminate\Http\Request;

class CauHinhChungController extends Controller
{
    public function DanhSach()
    {
        $TieuDe = 'Quản lý cấu hình chung';
        $setting = CauHinhChung::first();
        return view('admin.cau-hinh-chung.them', compact('setting', 'TieuDe'));
    }

    public function themCauHinhChung()
    {
        $TieuDe = 'Thêm cấu hình chung';
        $update = null;
        return view('admin.cau-hinh-chung.them', compact('update', 'TieuDe'));
    }

    public function xulyThemCauHinhChung(Request $data)
    {
        $add = new CauHinhChung;
        $add->dien_thoai = $data->setting_phone;
        $add->hotline = $data->setting_hotline;
        $add->zalo = $data->setting_zalo;
        $add->copyright = $data->setting_copyright;
        $add->email = $data->setting_email;
        $add->fanpage = $data->setting_fanpage;
        $add->dia_chi = $data->setting_dia_chi;
        $add->link_map = $data->setting_link_map;
        $add->khoang_gia = $data->setting_khoang_gia;
        $add->khoang_gia_admin = $data->setting_khoang_gia_admin;
        $add->save();

        return redirect()->route('LayDsCauHinhChung')->with('noti', 'Thêm cấu hình chung thành công !');
    }

    public function capnhatCauHinhChung($id)
    {
        $update = CauHinhChung::find($id);
        $TieuDe = 'Cập nhật cấu hình chung';

        if ($update == null) {
            return redirect()->route('LayDsCauHinhChung');
        } else {
            return view('admin.cau-hinh-chung.them', compact('TieuDe', 'update'));
        }
    }

    public function xulyCapNhatCauHinhChung(Request $data, $id)
    {
        $update = CauHinhChung::find($id);
        $update->dien_thoai = $data->setting_phone;
        $update->hotline = $data->setting_hotline;
        $update->zalo = $data->setting_zalo;
        $update->copyright = $data->setting_copyright;
        $update->email = $data->setting_email;
        $update->fanpage = $data->setting_fanpage;
        $update->dia_chi = $data->setting_dia_chi;
        $update->link_map = $data->setting_link_map;
        $update->khoang_gia_admin = $data->setting_khoang_gia_admin;
        $update->save();

        return redirect()->route('LayDsCauHinhChung')->with('noti', 'Cập nhật cấu hình chung thành công !');
    }

    public function xoaCauHinhChung($id)
    {
        $delete = CauHinhChung::find($id);
        $delete->delete();

        return redirect()->route('LayDsCauHinhChung')->with('success', 'Xóa dữ liệu thành công');
    }
}
