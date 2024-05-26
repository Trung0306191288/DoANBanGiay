<?php

namespace App\Http\Controllers;

use App\Models\DanhMucCapHai;
use App\Models\DanhMucCapMot;
use App\Http\Requests\DanhMucCapHaiRequest;
use Illuminate\Http\Request;


class DanhMucCapHaiController extends Controller
{
    public function DanhSach()
    {
        $pageName = 'Quản lý Dang mục cấp hai';
        $category_two = DanhMucCapHai::get()->sortBy('id');
        return view('admin.danh-muc-cap-hai.danh-sach', compact('category_two','pageName'));
    }

    public function themDanhMucCapHai()
    {
        $pageName = 'Thêm danh mục cấp hai';
        $cap_mot = DanhMucCapMot::get()->sortBy('id');
        $update = NULL;

        return view('admin.danh-muc-cap-hai.them', compact('pageName', 'update','cap_mot'));
    }

    public function xulyThemDanhMucCapHai(DanhMucCapHaiRequest $data) {

        $add = new DanhMucCapHai;
        $data->validate(
            [
                'ten_cap_hai' => 'unique:danh_muc_cap_hais,ten',
            ],
            [
                'ten_cap_hai.unique' => 'Tên danh mục không được giống nhau',
            ]
        );
        if($data->hinh_anh_cap_hai != NULL) {
            $images = $data->hinh_anh_cap_hai;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/danhmuccaphai'), $imageName);
            $add->hinh_anh = $imageName;
        }    
        $add->ten = $data->ten_cap_hai;
        $add->tinh_trang = $data->tinh_trang_cap_hai;
        $add->id_cap_mot = $data->cap_mot_san_pham;
        $add->save();
        return redirect()->route('LayDsDanhMucCapHai')->with('noti','Thêm danh mục thành công !');
    }

    public function capnhatDanhMucCapHai($id) {
        $update = DanhMucCapHai::find($id);
        $cap_mot = DanhMucCapMot::get()->sortBy('id');
        $pageName = 'Chỉnh sửa danh mục cấp hai';

        if ($update == null) {
            return view('san_phams');
        } else {
            return view('admin.danh-muc-cap-hai.them', compact('pageName','update','cap_mot'));
        }
    }

    public function xulyCapNhatDanhMucCapHai(DanhMucCapHaiRequest $data, $id) {

        $add = DanhMucCapHai::find($id);
        if($add->ten == $data->ten_cap_hai) {
            if($data->hinh_anh_cap_hai != NULL) {
                if($add['hinh_anh'] != NULL) {
                    $removeFile = public_path('upload/danhmuccaphai/'.$add['hinh_anh']);
                    if(file_exists($removeFile)) {
                        unlink($removeFile);
                    }
                }
                $images = $data->hinh_anh_cap_hai;      
                $imageName = time().'.'.$images->extension();  
                $images->move(public_path('upload/danhmuccaphai'), $imageName);
                $add->hinh_anh = $imageName;
            }    
            $add->ten = $data->ten_cap_hai;
            $add->tinh_trang = $data->tinh_trang_cap_hai;
            $add->id_cap_mot = $data->cap_mot_san_pham;
        } else {
            $data->validate(
                [
                    'ten_cap_hai' => 'unique:danh_muc_cap_hais,ten',
                ],
                [
                    'ten_cap_hai.unique' => 'Tên danh mục không được giống nhau',
                ]
            );
            if($data->hinh_anh_cap_hai != NULL) {
                $removeFile = public_path('upload/danhmuccaphai/'.$add['hinh_anh']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
                $images = $data->hinh_anh_cap_hai;      
                $imageName = time().'.'.$images->extension();  
                $images->move(public_path('upload/danhmuccaphai'), $imageName);
                $add->hinh_anh = $imageName;
            }    
            $add->ten = $data->ten_cap_hai;
            $add->tinh_trang = $data->tinh_trang_cap_hai;
            $add->id_cap_mot = $data->cap_mot_san_pham;
        }
        $add->save();
        return redirect()->route('LayDsDanhMucCapHai')->with('noti','Cập nhật danh mục thành công !');
    }

    public function xoaDanhMucCapHai($id) {
        $dlt = DanhMucCapHai::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            return view('LayDsDanhMucCapHai');
        } else {
            if($dlt['hinh_anh']) {
                $removeFile = public_path('upload/danhmuccaphai/'.$dlt['hinh_anh']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $dlt->delete();
            return redirect()->route('LayDsDanhMucCapHai')->with('success', 'Xóa dữ liệu thành công');
        }
    }

    public function timkiemDanhMucCapHai(Request $data)
    {
        $pageName = 'Tìm kiếm danh mục cấp hai';
        $search = DanhMucCapHai::where('ten', 'LIKE', '%'.$data->name_search.'%')->get();
        return view('admin.danh-muc-cap-hai.tim-kiem', compact('search','pageName'));
    }
}
