<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThanhVien;
use App\Models\PhanQuyen;

class MemberClientController extends Controller
{
    public function index()
    {
        $member_client = ThanhVien::where([
            ['vai_tro','!=','0'],
            ['vai_tro','!=','1']
        ])->get();
        $pageName = 'Quản lý tài khoản người dùng';
        return view('admin.member_client.index', compact('member_client', 'pageName'));
    }

    public function loadUpdateMember_client($id){
        $update = ThanhVien::find($id);
        $cate_mem = PhanQuyen::where('tinh_trang_vai_tro', '!=', '1')->get();
        $cate_mem_up = PhanQuyen::where('id',$update['id_phan_quyen'])->firstOrFail();
        $pageName = 'Chỉnh sửa tài khoản người dùng';

        return view('admin.member_client.detail', compact('update', 'pageName','cate_mem','cate_mem_up'));
    }

    public function handleUpdateMember_client(Request $data, $id){
        $add = ThanhVien::find($id);
        //
        if($add->username == $data->username) {

            $data->validate(
                [
                    'username' => 'required',
                    'cate_member' => 'required'
                ],
                [
                    'username.required' => 'Tên đăng nhập không được trống',
                    'cate_member.required' => 'Danh mục thành viên không được trống không được trống'
                ]
            );
            // dd($add);
            $add->ho_ten = $data->name_member;
            if($data->cate_member != NULL) {
                $add->id_phan_quyen = $data->cate_member;
            } else {
                $add->id_phan_quyen = '2';
            }
            
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
                    $removeFile = public_path('upload/member_client/'.$add['hinh_anh']);
                    if(file_exists($removeFile)) {
                        unlink($removeFile);
                    }
                }
                $images = $data->photo_member;      
                $imageName = time().'.'.$images->extension();  
                $images->move(public_path('upload/member_client'), $imageName);
                $add->hinh_anh = $imageName;
            }    
            $add->tinh_trang = $data->status_member;
            $add->vai_tro = '2';
        } else {
            $data->validate(
                [
                    'username' => 'required|unique:thanh_viens,username',
                    'cate_member' => 'required',
                ],
                [
                    'username.required' => 'Tên đăng nhập không được trống',
                    'username.unique' => 'Tên đăng nhập bị trùng',
                    'cate_member.required' => 'Danh mục thành viên không được trống không được trống',
                ]
            );
            $add->ho_ten = $data->name_member;
            if($data->cate_member != NULL) {
                $add->id_phan_quyen = $data->cate_member;
            } else {
                $add->id_phan_quyen = '2';
            }
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
                    $removeFile = public_path('upload/member_client/'.$add['hinh_anh']);
                    if(file_exists($removeFile)) {
                        unlink($removeFile);
                    }
                }
                $images = $data->photo_member;      
                $imageName = time().'.'.$images->extension();  
                $images->move(public_path('upload/member_client'), $imageName);
                $add->hinh_anh = $imageName;
            }    
            $add->tinh_trang = $data->status_member;
            $add->vai_tro = '2';
        } 
        $add->save();
        return redirect()->route('member_client')->with('noti','cập nhật tài khoản thành công !!!');
    }

    public function deleteMember_client($id)
    {
        $dlt = ThanhVien::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            $pageName = 'Quản lý tài khoản người dùng';
            $member_client = ThanhVien::where([
                ['vai_tro','!=','0'],
                ['vai_tro','!=','1']
            ])->get();
            return view('admin.member_client.index',compact('member_client','pageName'));
        } else {
            if($dlt['hinh_anh'] != NULL) {
                $removeFile = public_path('upload/member_client/'.$dlt['hinh_anh']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $dlt->delete();
            return redirect()->route('member_client');
        }
    }
}
