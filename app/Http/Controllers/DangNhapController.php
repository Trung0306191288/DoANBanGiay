<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\ThanhVien;

class DangNhapController extends Controller
{
    public function DangNhap(Request $data)
    {
        if (Auth::guard('user')->attempt($data->only(['username', 'password']))) {
            return redirect()->route('dashboard')->with('noti', 'Đã đăng nhập thành công');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function DangXuat(Request $data): RedirectResponse
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
            return redirect()->route('dangnhap');
        }

        $this->guard()->logout();
        $data->session()->invalidate();

        return $this->loggedOut($data) ?: redirect('/');
    }

    public function doi_mat_khau_admin(Request $data)
    {
        $pageName = 'Đổi mật khẩu';
        return view('admin.member_admin.change_pass', compact('pageName'));
    }

    public function xu_ly_doi_mat_khau_admin(Request $data)
    {

        $update = ThanhVien::find(Auth::guard('user')->user()->id);
        if ($data->password_new == $data->comfirm_password) {
            $update->password = Hash::make($data->password_new);
            $update->save();
            return redirect()->route('dashboard')->with('noti', 'Đổi mật khẩu thành công !!!');
        } else {
            return redirect()->route('dashboard')->with('noti', 'Đổi mật khẩu thất bại !!!');
        }
    }
}
