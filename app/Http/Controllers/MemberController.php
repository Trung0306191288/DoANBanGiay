<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Permission;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Http\Requests\MemberRequest;
use App\Models\ThanhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index() {
       $member_admins = ThanhVien::where([
            ['role', '1'],
            ['id_cate_member', '1']
       ])->get();  
       $pageName = 'Quản lý tài khoản admin';
       return view('admin.member_admins.index_member', compact('member_admins','pageName'));
    }

    public function loadAddMember_admins()
    {
        $pageName = 'Thêm tài khoản admin';
        $cate_mem = Permission::where('status', '0')->get();
        $update = NULL;
        return view('admin.member_admins.add_member', compact('update','pageName','cate_mem'));
    }

    public function handleAddMember_admins(MemberRequest $data)
    {
        $add = new Member;
        $data->validate(
            [
                'username' => 'required|unique:members,username',
                'password' => 'required',
            ],
            [
                'username.required' => 'Tên đăng nhập không được trống',
                'username.unique' => 'Tên đăng nhập bị trùng',
                'password.required' => 'Mật khẩu không được trống',
            ]
        );
        $add->fullname = $data->name_member;
        $add->id_cate_member = $data->cate_member;
        $add->username = $data->username;
        $add->password = Hash::make($data->password);
        $add->address = $data->address;
        $add->phone = $data->phone;
        $add->email = $data->email;
        $add->birthday = $data->birthday;
        if($data->photo_member != NULL) {
            $images = $data->photo_member;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/member_admins'), $imageName);
            $add->photo = $imageName;
        }    
        $add->status = $data->status_member;
        $add->role = 1;
        $add->save();
        return redirect()->route('member_admins')->with('noti','Thêm tài khoản thành công !!!');
    }

    public function loadUpdateMember_admins($id)
    {
        $pageName = 'Chỉnh sửa tài khoản admin';
        $cate_mem = Permission::where('status_role', '0')->get();
        $update = Member::find($id);
        
        if ($update == null) {
            return view('member_admins');
        } else {
            return view('admin.member_admins.add_member', compact('pageName','update','cate_mem'));
        }
    }

    public function handleUpdateMember_admins(MemberRequest $data, $id) {

        $add = Member::find($id);
        if($add->username == $data->username) {
            $data->validate(
                [
                    'username' => 'required',
                ],
                [
                    'username.required' => 'Tên đăng nhập không được trống',
                ]
            );
            $add->fullname = $data->name_member;
            $add->id_cate_member = $data->cate_member;
            $add->username = $data->username;
            if($data->password != NULL) {
                $add->password = Hash::make($data->password);
            }
            $add->address = $data->address;
            $add->phone = $data->phone;
            $add->email = $data->email;
            $add->birthday = $data->birthday;
            if($data->photo_member != NULL) {
                if($add['photo'] != NULL) {
                    $removeFile = public_path('upload/member_admin/'.$add['photo']);
                    if(file_exists($removeFile)) {
                        unlink($removeFile);
                    }
                }
                $images = $data->photo_member;      
                $imageName = time().'.'.$images->extension();  
                $images->move(public_path('upload/member_admin'), $imageName);
                $add->photo = $imageName;
            }    
            $add->status = $data->status_member;
            if($add->role != 0) {
                $add->role = 1;
            } else {
                $add->role = 0; 
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
            $add->fullname = $data->name_member;
            $add->id_cate_member = $data->cate_member;
            $add->username = $data->username;
            if($data->password != NULL) {
                $add->password = Hash::make($data->password);
            }
            $add->address = $data->address;
            $add->phone = $data->phone;
            $add->email = $data->email;
            $add->birthday = $data->birthday;
            if($data->photo_member != NULL) {
                if($add['photo'] != NULL) {
                    $removeFile = public_path('upload/member_admin/'.$add['photo']);
                    if(file_exists($removeFile)) {
                        unlink($removeFile);
                    }
                }
                $images = $data->photo_member;      
                $imageName = time().'.'.$images->extension();  
                $images->move(public_path('upload/member_admin'), $imageName);
                $add->photo = $imageName;
            }    
            $add->status = $data->status_member;
            if($add->role != 0) {
                $add->role = 1;
            } else {
                $add->role = 0; 
            }
        } 
        $add->save();
        return redirect()->route('member_admin')->with('noti','cập nhật tài khoản thành công !!!');
    }

    public function deleteMember_admins($id)
    {
        $dlt = Member::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            $member_admins = Member::where([
                ['role', '1'],
                ['id_cate_member', '1']
           ])->get();  
           $pageName = 'Quản lý tài khoản admin';
           return view('admin.member_admin.index_member', compact('member_admin','pageName'));
        } else {
            if($dlt['photo'] != NULL) {
                $removeFile = public_path('upload/member_admin/'.$dlt['photo']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $dlt->delete();
            return redirect()->route('member_admin');
        }
    }

}
