<?php

namespace App\Http\Controllers;

use App\Models\DanhMucCapMot;
use App\Http\Requests\DanhMucCapMotRequest;
use Illuminate\Http\Request;

class DanhMucCapMotController extends Controller
{
    public function DanhSach()
    {
        $categories = DanhMucCapMot::get()->sortBy('id');
        $TieuDe = 'Quản lý danh mục cấp một';

        return view('admin.danh-muc-cap-mot.danh-sach', compact('categories', 'TieuDe'));
    }

    public function themDanhMucCapMot()
    {
        $TieuDe = 'Thêm danh mục cấp một';
        $update = NULL;

        return view('admin.danh-muc-cap-mot.them', compact('TieuDe', 'update'));
    }

    public function xulyThemDanhMucCapMot(DanhMucCapMotRequest $data)
    {
        $add = new DanhMucCapMot();

        if ($data->hinh_anh != NULL) {
            $images = $data->hinh_anh;
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('upload/danhmuccapmot'), $imageName);
            $add->hinh_anh = $imageName;
        }
        $add->ten = $data->ten;
        $add->tinh_trang = $data->input('tinh_trang');
        $add->save();

        return redirect()->route('LayDsDanhMucCapMot')->with('noti','Thêm danh mục thành công !');
    }

    public function capnhatDanhMucCapMot($id)
    {
        $update = DanhMucCapMot::find($id);
        $TieuDe = 'Cập nhật danh mục cấp một';

        return view('admin.danh-muc-cap-mot.them', compact('update', 'TieuDe'));
    }

    public function xulyCapNhatDanhMucCapMot(DanhMucCapMotRequest $data, $id)
    {
        $update = DanhMucCapMot::find($id);

        if ($data->hinh_anh != NULL) {
            if($update['hinh_anh'] != NULL) {
                $removeFile = public_path('upload/danhmuccapmot/'.$update['hinh_anh']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $data->validate([
                'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $images = $data->hinh_anh;
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('upload/danhmuccapmot'), $imageName);
            $update->hinh_anh = $imageName;
        }
        $update->ten = $data->ten;
        $update->tinh_trang = $data->tinh_trang;
        $update->save();

        return redirect()->route('LayDsDanhMucCapMot')->with('noti','Cập nhật danh mục thành công !');
    }

    public function xoaDanhMucCapMot($id)
    {
        $delete = DanhMucCapMot::find($id);
        if($delete['hinh_anh'] != NULL) {
            $removeFile = public_path('upload/danhmuccapmot/'.$delete['hinh_anh']);
            if(file_exists($removeFile)) {
                unlink($removeFile);
            }
        }
        $delete->delete();
        return redirect()->route('LayDsDanhMucCapMot')->with('success', 'Xóa dữ liệu thành công');
    }

    public function timkiemDanhMucCapMot(Request $data)
    {
        $TieuDe = 'Tìm kiếm danh mục cấp một';
        $search = DanhMucCapMot::where('ten', 'LIKE', '%'.$data->name_search.'%')->get();
        return view('admin.danh-muc-cap-mot.tim-kiem', compact('search','TieuDe'));
    }
}
