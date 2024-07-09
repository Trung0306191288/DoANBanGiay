<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Clients\AccountRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\ThanhVien;
use App\Models\PhanQuyen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class TaiKhoanController extends Controller
{
    public function login()
    {
        return view('client.account.login');
    }

    public function DangNhap(Request $request)
{
    // Attempt to authenticate the user
    if (Auth::guard('client')->attempt($request->only(['username', 'password']))) {
        // Authentication successful, redirect to clientIndex
        return redirect()->route('TrangChu');
    } else {
        // Authentication failed, redirect back with error message
        return redirect()
            ->back()
            ->withInput()
            ->with('status', 'Tên đăng nhập hoặc Mật khẩu không chính xác');
    }
}

    public function register()
    {
        return view('client.account.register');
    }

    public function handleRegister(AccountRequest $request)
    {
        $account = new ThanhVien();
        $account->id_phan_quyen = 2;
        $account->ho_ten = $request->username;
        $account->username = $request->username;
        $account->password = Hash::make($request->password);
        $account->dien_thoai = $request->dien_thoai;
        $account->email = $request->email;
        $account->tinh_trang = 1;
        $account->vai_tro = 2;
        $account->save();

        return redirect()->route('clientLogin');
    }

    public function dangxuat(Request $request): RedirectResponse
    {
        if (Auth::guard('client')->check()) {
            Auth::guard('client')->logout();
            return redirect()->route('TrangChu');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    public function clientInfo()
    {
        $TieuDe = 'Thông tin cá nhân';
        $id = Auth::guard('client')->id();
        $clientInfo = ThanhVien::where('id', $id)->first();
        $nowDate = date('Y-m-d');
        return view('client.account.info', compact('TieuDe', 'clientInfo', 'nowDate'));
    }

    public function handleUpdate(Request $request)
    {
        $id = Auth::guard('client')->id();

        $account = ThanhVien::find($id);
        $account->ho_ten = $request->ho_ten;
        if (!$request->username)
            $account->username = $account->username;
        if ($request->password)
            $account->password = Hash::make($request->password);
        else
            $account->password = $account->password;
        $account->dien_thoai = $request->dien_thoai;
        $account->email = $request->email;
        $account->dia_chi = $request->dia_chi;
        $account->nam_sinh = $request->nam_sinh;
        $account->save();

        return redirect()->route('clientInfo')->with(session()->flash('success', 'Đã cập nhật thông tin thành công!'));
    }
}
