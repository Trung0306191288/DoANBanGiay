<?php

namespace App\Http\Controllers;

use App\Models\PhanQuyen;
use App\Http\Requests\Storecategory_memberRequest;
use App\Http\Requests\Updatecategory_memberRequest;
use Illuminate\Http\Request;

class CategoryMemberController extends Controller
{
    public function index() {
        $pageName = 'Quản lý Danh Mục Tài khoản';
        $cate_member = PhanQuyen::where(
            [
                ['tinh_trang_vai_tro','!=',1],
                ['tinh_trang_vai_tro','!=',2],
            ]
        )->get();
        return view('admin.member_admins.category_member.index', compact('cate_member','pageName'));
    }

    public function loadAddCate_Member() {
        $pageName = 'Thêm Danh mục tài khoản';
        $update = NULL;
        return view('admin.member_admins.category_member.add', compact('pageName','update'));
    }

    public function handleAddCate_Member(Request $data) {
        $add = new PhanQuyen;
        $data->validate(
            [
                'ten_vai_tro' => 'required|unique:phan_quyens,ten_vai_tro',
            ],
            [
                'ten_vai_tro.required' => 'Tên danh mục không được trống',
                'ten_vai_tro.unique' => 'Tên danh mục bị trùng',
            ]
        );
        $add->ten_vai_tro = $data->ten_vai_tro;
        $add->tinh_trang_vai_tro = 3;
        $add->tinh_trang = $data->tinh_trang;
        $add->save();
        return redirect()->route('cate_members')->with('noti','Thêm danh mục thành công !!!');
    }

    public function loadUpdateCate_Member($id) {
        $pageName = 'Chỉnh sửa Danh mục tài khoản';
        $update = PhanQuyen::find($id);
        if ($update == null) {
            return view('member_admins.category_member');
        } else {
            return view('admin.member_admins.category_member.add', compact('pageName','update'));
        }
    }

    public function handleUpdateCate_Member(Request $data, $id) {
        $add = PhanQuyen::find($id);
        if($add->ten_vai_tro == $data->ten_vai_tro) {
            $add->ten_vai_tro = $data->ten_vai_tro;
            $add->tinh_trang_vai_tro = 3;
            $add->tinh_trang = $data->tinh_trang_cate_menber;
        } else {
            $data->validate(
                [
                    'ten_vai_tro' => 'required|unique:phan_quyens,ten_vai_tro',
                ],
                [
                    'ten_vai_tro.required' => 'Tên danh mục không được trống',
                    'ten_vai_tro.unique' => 'Tên danh mục bị trùng',
                ]
            );
            $add->ten_vai_tro = $data->ten_vai_tro;
            $add->tinh_trang_vai_tro = 3;
            $add->tinh_trang = $data->tinh_trang;
        }  
        $add->save();
        return redirect()->route('cate_members')->with('noti','Cập nhật danh mục thành công !!!');
    }

    public function deleteCate_Member($id) {
        $dlt = PhanQuyen::find($id);
        if($dlt == NULL && $dlt->deleted_at != NULL) {
            return view('colors');
        } else {
            $dlt->delete();
            return redirect()->route('cate_members');
        }
    }
}
