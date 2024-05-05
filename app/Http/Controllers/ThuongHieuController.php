<?php

namespace App\Http\Controllers;

use App\Models\ThuongHieu;
use App\Http\Requests\ThuongHieuRequest;
use Illuminate\Http\Request;

class ThuongHieuController extends Controller
{
    public function index()
    {
        $brands = ThuongHieu::get()->sortBy('id');
        $pageName = 'Quản lý thương hiệu';

        return view('admin.thuong-hieu.index', compact('brands', 'pageName'));
    }

    public function themThuongHieu()
    {
        $pageName = 'Thêm thương hiệu';
        $update = NULL;

        return view('admin.thuong-hieu.add', compact('pageName', 'update'));
    }

    public function xulyThemThuongHieu(ThuongHieuRequest $data)
    {
        $add = new ThuongHieu();

        if ($data->hinh_anh != NULL) {
            $data->validate([
                'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $images = $data->hinh_anh;
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('upload/thuonghieu'), $imageName);
            $add->hinh_anh = $imageName;
        }
        $add->ten = $data->ten;
        $add->tinh_trang = $data->tinh_trang;
        $add->save();

        return redirect()->route('LayDsThuongHieu')->with('noti','Thêm thương hiệu thành công !!!');
    }

    public function capnhatThuongHieu($id)
    {
        $update = ThuongHieu::find($id);
        $pageName = 'Chỉnh sửa thương hiệu';

        return view('admin.thuong-hieu.add', compact('update', 'pageName'));
    }

    public function xulyCapNhatThuongHieu(ThuongHieuRequest $data, $id)
    {
        $update = ThuongHieu::find($id);

        if ($data->hinh_anh != NULL) {
            if($update['hinh_anh'] != NULL) {
                $removeFile = public_path('upload/thuonghieu/'.$update['hinh_anh']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $images = $data->hinh_anh;
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('upload/thuonghieu'), $imageName);
            $update->hinh_anh = $imageName;
        }
        $update->ten = $data->ten;
        $update->tinh_trang = $data->tinh_trang;
        $update->save();

        return redirect()->route('LayDsThuongHieu')->with('noti','Cập nhật thương hiệu thành công !!!');
    }

    public function xoaThuongHieu($id)
    {
        $delete = ThuongHieu::find($id);
        if($delete['hinh_anh'] != NULL) {
            $removeFile = public_path('upload/thuonghieu/'.$delete['hinh_anh']);
            if(file_exists($removeFile)) {
                unlink($removeFile);
            }
        }
        $delete->delete();
        return redirect()->route('LayDsThuongHieu')->with('success', 'Xóa dữ liệu thành công');
    }

    public function timkiemThuongHieu(Request $data)
    {
        $pageName = 'Tìm kiếm thương hiệu';
        $search = ThuongHieu::where('ten', 'LIKE', '%'.$data->name_search.'%')->get();
        return view('admin.thuong-hieu.search', compact('search','pageName'));
    }
}
