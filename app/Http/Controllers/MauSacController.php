<?php

namespace App\Http\Controllers;

use App\Models\MauSac;
use App\Http\Requests\MauSacRequest;
use Illuminate\Http\Request;

class MauSacController extends Controller
{
    public function DanhSach()
    {
        $pageName = 'Quản lý màu sắc';
        $colors = MauSac::get()->sortBy('id');
        return view('admin.mau-sac.danh-sach', compact('colors','pageName'));
    }

    public function themMauSac()
    {
        $pageName = 'Thêm màu sắc';
        $update = NULL;
        return view('admin.mau-sac.them', compact('update','pageName'));
    }

    public function xulyThemMauSac(MauSacRequest $data)
    {
        $add = new MauSac;
        $add->ten = $data->ten_mau_sac;
        $add->code_mau = $data->ten_ma;
        $add->save();
        return redirect()->route('LayDsMauSac')->with('noti','Thêm màu sắc thành công !');
    }

    public function capnhatMauSac($id)
    {
        $pageName = 'Cập nhật màu sắc';
        $update = MauSac::find($id);
        if ($update == null) {
            return view('LayDsMauSac');
        } else {
            return view('admin.mau-sac.them', compact('update','pageName'));
        }
    }

    public function xulyCapNhatMauSac(MauSacRequest $data,$id)
    {
        $add = MauSac::find($id);
        $add->ten = $data->ten_mau_sac;
        $add->code_mau = $data->ten_ma;
        // $add->status = $data->name_size;
        $add->save();
        return redirect()->route('LayDsMauSac')->with('noti','Cập nhật màu sắc thành công !');
    }

    public function xoaMauSac($id) {
        $dlt = MauSac::find($id);
        if($dlt == NULL && $dlt->deleted_at != NULL) {
            return view('LayDsMauSac');
        } else {
            $dlt->delete();
            return redirect()->route('LayDsMauSac')->with('noti', 'Xóa dữ liệu thành công');
        }
    }

    public function timkiemMauSac(Request $data)
    {
        $pageName = 'Tìm kiếm màu sắc';
        $search = MauSac::where('ten', 'LIKE', '%'.$data->name_search.'%')->get();
        return view('admin.mau-sac.tim-kiem', compact('search','pageName'));
    }
}
