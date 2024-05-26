<?php

namespace App\Http\Controllers;

use App\Models\ThanhVien;
use App\Models\PhanQuyen;
use App\Http\Requests\StoreThanhVienRequest;
use App\Http\Requests\UpdateThanhVienRequest;
use App\Http\Requests\Member_Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index() {
       $member_admins = ThanhVien::where([
            ['vai_tro', '1'],
            ['id_phan_quyen', '1']
       ])->get();  
       $pageName = 'Quản lý tài khoản admin';
       return view('admin.member_admins.index_member', compact('member_admins','pageName'));
    }

    public function loadAddMember_admins()
    {
        $pageName = 'Thêm tài khoản admin';
        $cate_mem = PhanQuyen::where('tinh_trang', '0')->get();
        $update = NULL;
        return view('admin.member_admins.add_member', compact('update','pageName','cate_mem'));
    }

    public function handleAddMember_admins(Member_Request $data)
    {
        $add = new ThanhVien;
        $data->validate(
            [
                'username' => 'required|unique:thanh_viens,username',
                'password' => 'required',
            ],
            [
                'username.required' => 'Tên đăng nhập không được trống',
                'username.unique' => 'Tên đăng nhập bị trùng',
                'password.required' => 'Mật khẩu không được trống',
            ]
        );
        $add->ho_ten = $data->ho_ten;
        $add->id_phan_quyen = $data->cate_member;
        $add->username = $data->username;
        $add->password = Hash::make($data->password);
        $add->dia_chi = $data->dia_chi;
        $add->dien_thoai = $data->dien_thoai;
        $add->email = $data->email;
        $add->nam_sinh = $data->nam_sinh;
        if($data->photo_member != NULL) {
            $images = $data->photo_member;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/member_admins'), $imageName);
            $add->hinh_anh = $imageName;
        }    
        $add->tinh_trang = $data->status_member;
        $add->vai_tro = 1;
        $add->save();
        return redirect()->route('member_admins')->with('noti','Thêm tài khoản thành công !!!');
    }

    public function loadUpdateMember_admins($id)
    {
        $pageName = 'Chỉnh sửa tài khoản admin';
        $cate_mem = PhanQuyen::where('tinh_trang_vai_tro', '0')->get();
        $update = ThanhVien::find($id);
        
        if ($update == null) {
            return view('member_admins');
        } else {
            return view('admin.member_admins.add_member', compact('pageName','update','cate_mem'));
        }
    }

    public function handleUpdateMember_admins(Member_Request $data, $id) {

        $add = ThanhVien::find($id);
        if($add->username == $data->username) {
            $data->validate(
                [
                    'username' => 'required',
                ],
                [
                    'username.required' => 'Tên đăng nhập không được trống',
                ]
            );
            $add->ho_ten = $data->ho_ten;
            $add->id_phan_quyen = $data->cate_member;
            $add->username = $data->username;
            if($data->password != NULL) {
                $add->password = Hash::make($data->password);
            }
            $add->dia_chi = $data->dia_chi;
            $add->dien_thoai = $data->dien_thoai;
            $add->email = $data->email;
            $add->nam_sinh = $data->nam_sinh;
            if($data->photo_member != NULL) {
                if($add['hinh_anh'] != NULL) {
                    $removeFile = public_path('upload/member_admins/'.$add['hinh_anh']);
                    if(file_exists($removeFile)) {
                        unlink($removeFile);
                    }
                }
                $images = $data->photo_member;      
                $imageName = time().'.'.$images->extension();  
                $images->move(public_path('upload/member_admins'), $imageName);
                $add->hinh_anh = $imageName;
            }    
            $add->tinh_trang = $data->status_member;
            if($add->vai_tro != 0) {
                $add->vai_tro = 1;
            } else {
                $add->vai_tro = 0; 
            }
        } else {
            $data->validate(
                [
                    'username' => 'required|unique:members,username',
                ],
                [
                    'username.required' => 'Tên đăng nhập không được trống',
                    'username.unique' => 'Tên đăng nhập bị trùng',
                ]
            );
            $add->ho_ten = $data->ho_ten;
            $add->id_phan_quyen = $data->cate_member;
            $add->username = $data->username;
            if($data->password != NULL) {
                $add->password = Hash::make($data->password);
            }
            $add->dia_chi = $data->dia_chi;
            $add->dien_thoai = $data->dien_thoai;
            $add->email = $data->email;
            $add->nam_sinh = $data->nam_sinh;
            if($data->photo_member != NULL) {
                if($add['hinh_anh'] != NULL) {
                    $removeFile = public_path('upload/member_admins/'.$add['hinh_anh']);
                    if(file_exists($removeFile)) {
                        unlink($removeFile);
                    }
                }
                $images = $data->photo_member;      
                $imageName = time().'.'.$images->extension();  
                $images->move(public_path('upload/member_admins'), $imageName);
                $add->hinh_anh = $imageName;
            }    
            $add->tinh_trang = $data->status_member;
            if($add->vai_tro != 0) {
                $add->vai_tro = 1;
            } else {
                $add->vai_tro = 0; 
            }
        } 
        $add->save();
        return redirect()->route('member_admins')->with('noti','cập nhật tài khoản thành công !!!');
    }

    public function deleteMember_admins($id)
    {
        $dlt = ThanhVien::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            $member_admins = ThanhVien::where([
                ['vai_tro', '1'],
                ['id_phan_quyen', '1']
           ])->get();  
           $pageName = 'Quản lý tài khoản admin';
           return view('admin.member_admins.index_member', compact('member_admins','pageName'));
        } else {
            if($dlt['hinh_anh'] != NULL) {
                $removeFile = public_path('upload/member_admins/'.$dlt['hinh_anh']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $dlt->delete();
            return redirect()->route('member_admins');
        }
    }

}
