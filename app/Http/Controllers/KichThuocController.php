<?php

namespace App\Http\Controllers;

use App\Models\KichThuoc;
use App\Http\Requests\KichThuocRequest;
use Illuminate\Http\Request;

class KichThuocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function DanhSach()
    {
        $TieuDe = 'Quản lý Kích thước';
        $sizes = KichThuoc::get()->sortBy('id');
        return view('admin.kich-thuoc.danh-sach', compact('sizes','TieuDe'));
    }

    public function themKichThuoc()
    {
        $TieuDe = 'Thêm kích thước';
        $update = NULL;
        return view('admin.kich-thuoc.them', compact('update','TieuDe'));
    }

    public function xulyThemKichThuoc(KichThuocRequest $data)
    {
        $add = new KichThuoc;
        $add->ten = $data->ten_kich_thuoc;
        $add->save();
        return redirect()->route('LayDsKichThuoc')->with('noti','Thêm kích thước thành công !');
    }

    public function capnhatKichThuoc($id) {
        $TieuDe = 'Cập nhật kích thước';
        $update = KichThuoc::find($id);
        if ($update == null) {
            return view('LayDsKichThuoc');
        } else {
            return view('admin.kich-thuoc.them', compact('update','TieuDe'));
        }
    }

    public function xulyCapNhatKichThuoc(KichThuocRequest $data, $id)
    {
        $add = KichThuoc::find($id);
        $add->ten = $data->ten_kich_thuoc;
        $add->save();
        return redirect()->route('LayDsKichThuoc')->with('noti','Cập nhật Kích thước thành công !');
    }

    public function xoaKichThuoc($id)
    {
        $dlt = KichThuoc::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            return view('LayDsKichThuoc');
        } else {
            $dlt->delete();
            return redirect()->route('LayDsKichThuoc')->with('noti', 'Xóa dữ liệu thành công');
        }
    }

    public function timkiemKichThuoc(Request $data)
    {
        $TieuDe = 'Tìm kiếm kích thước';
        $search = KichThuoc::where('ten', 'LIKE', '%'.$data->name_search.'%')->get();
        return view('admin.kich-thuoc.tim-kiem', compact('search','TieuDe'));
    }
}
