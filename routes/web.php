<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\DanhMucCapMotController;
use App\Http\Controllers\DanhMucCapHaiController;
use App\Http\Controllers\ThuongHieuController;
use App\Http\Controllers\KichThuocController;
use App\Http\Controllers\MauSacController;
use App\Http\Controllers\LoaiHinhAnhController;


use App\Http\Controllers\Clients\TrangChuController;


// Auth::routes();

Route::get('/', function () {
    return view('client.index');
});

Route::prefix('/')->group(function () {
    Route::get('/',[TrangChuController::class, 'index'])->name('clientIndex');
});


Route::get('/admin/login', function () {
    return view('admin.login');
});
Route::post('/admin/login', [DangNhapController::class, 'DangNhap'])->name('dangnhap');

Route::prefix('/admin')->group(function () {
    // Tài khoàn Admin
    Route::group(['middleware' => ['AuthChecker:admin']], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/admin/logout', [DangNhapController::class, 'DangXuat'])->name('dangxuat');
        Route::get('/doi-mat-khau-admin', [DangNhapController::class, 'doi_mat_khau_admin'])->name('doi_mat_khau_admin');
        Route::post('/doi-mat-khau-admin', [DangNhapController::class, 'xu_ly_doi_mat_khau_admin'])->name('xu_ly_doi_mat_khau_admin');

        // Thêm xóa sửa danh mục cấp một
        Route::prefix('/danh-muc-cap-mot')->group(function () {
            Route::get('/', [DanhMucCapMotController::class ,'index'])->name('LayDsDanhMucCapMot');
            Route::get('them', [DanhMucCapMotController::class ,'themDanhMucCapMot'])->name('loadThemDanhMucCapMot');
            Route::post('them', [DanhMucCapMotController::class ,'xulyThemDanhMucCapMot'])->name('xulyThemDanhMucCapMot');
            Route::get('cap-nhat/{id}', [DanhMucCapMotController::class ,'capnhatDanhMucCapMot'])->name('loadCapNhatDanhMucCapMot');
            Route::patch('cap-nhat/{id}', [DanhMucCapMotController::class ,'xulyCapNhatDanhMucCapMot'])->name('xulyCapNhatDanhMucCapMot');
            Route::get('xoa/{id}', [DanhMucCapMotController::class ,'xoaDanhMucCapMot'])->name('xoaDanhMucCapMot');
            Route::get('tim-kiem', [DanhMucCapMotController::class ,'timkiemDanhMucCapMot'])->name('timkiemdanhmuccapmot');
        });

        // Thêm xóa sửa danh mục cấp hai
        Route::prefix('/danh-muc-cap-hai')->group(function () {
            Route::get('/', [DanhMucCapHaiController::class ,'index'])->name('LayDsDanhMucCapHai');
            Route::get('them', [DanhMucCapHaiController::class ,'themDanhMucCapHai'])->name('loadThemDanhMucCapHai');
            Route::post('them', [DanhMucCapHaiController::class ,'xulyThemDanhMucCapHai'])->name('xulyThemDanhMucCapHai');
            Route::get('cap-nhat/{id}', [DanhMucCapHaiController::class ,'capnhatDanhMucCapHai'])->name('loadCapNhatDanhMucCapHai');
            Route::patch('cap-nhat/{id}', [DanhMucCapHaiController::class ,'xulyCapNhatDanhMucCapHai'])->name('xulyCapNhatDanhMucCapHai');
            Route::get('xoa/{id}', [DanhMucCapHaiController::class ,'xoaDanhMucCapHai'])->name('xoaDanhMucCapHai');
            Route::get('tim-kiem', [DanhMucCapHaiController::class ,'timkiemDanhMucCapHai'])->name('timkiemdanhmuccaphai');
        });

        // Thêm xóa sửa thương hiệu
        Route::prefix('/thuong-hieu')->group(function () {
            Route::get('/', [ThuongHieuController::class ,'index'])->name('LayDsThuongHieu');
            Route::get('them', [ThuongHieuController::class ,'themThuongHieu'])->name('loadThemThuongHieu');
            Route::post('them', [ThuongHieuController::class ,'xulyThemThuongHieu'])->name('xulyThemThuongHieu');
            Route::get('cap-nhat/{id}', [ThuongHieuController::class ,'capnhatThuongHieu'])->name('loadCapNhatThuongHieu');
            Route::patch('cap-nhat/{id}', [ThuongHieuController::class ,'xulyCapNhatThuongHieu'])->name('xulyCapNhatThuongHieu');
            Route::get('delete/{id}', [ThuongHieuController::class ,'xoaThuonghieu'])->name('xoaThuongHieu');
            Route::get('tim-kiem', [ThuongHieuController::class ,'timkiemThuongHieu'])->name('timkiemthuonghieu');
        });

        // Thêm xóa sửa kích thước
        Route::prefix('/kich-thuoc')->group(function () {
            Route::get('/', [KichThuocController::class,'index'])->name('LayDsKichThuoc');
            Route::get('them', [KichThuocController::class,'themKichThuoc'])->name('loadThemKichThuoc');
            Route::post('them',  [KichThuocController::class,'xulyThemKichThuoc'])->name('xulyThemKichThuoc');
            Route::get('cap-nhat/{id}', [KichThuocController::class,'capnhatKichThuoc'])->name('loadCapNhatKichThuoc');
            Route::post('cap-nhat/{id}',  [KichThuocController::class,'xulyCapNhatKichThuoc'])->name('xulyCapNhatKichThuoc');
            Route::get('xoa/{id}',  [KichThuocController::class,'xoaKichThuoc'])->name('xoaKichThuoc');
            Route::get('tim-kiem', [KichThuocController::class, 'timkiemKichThuoc'])->name('timkiemkichthuoc');
        });

        Route::prefix('/mau-sac')->group(function () {
            Route::get('/', [MauSacController::class,'index'])->name('LayDsMauSac');
            Route::get('them', [MauSacController::class,'themMauSac'])->name('loadThemMauSac');
            Route::post('them',  [MauSacController::class,'xulyThemMauSac'])->name('xulyThemMauSac');
            Route::get('cap-nhat/{id}', [MauSacController::class,'capnhatMauSac'])->name('loadCapNhatMauSac');
            Route::post('cap-nhat/{id}',  [MauSacController::class,'xulyCapNhatMauSac'])->name('xulyCapNhatMauSac');
            Route::get('xoa/{id}',  [MauSacController::class,'xoaMauSac'])->name('xoaMauSac');
            Route::get('tim-kiem', [MauSacController::class, 'timkiemMauSac'])->name('timkiemmausac');
        });

       
        Route::prefix('/loai-hinh-anh')->group(function () {
            Route::get('/{loai}/{cate}',[LoaiHinhAnhController::class, 'index'])->name('LayDsLoaiHinhAnh');
            Route::get('them/{loai}/{cate}',[LoaiHinhAnhController::class, 'themLoaiHinhAnh'])->name('loadThemLoaiHinhAnh');
            Route::post('them/{loai}/{cate}',[LoaiHinhAnhController::class, 'xulyThemLoaiHinhAnh'])->name('xulyThemLoaiHinhAnh');
            Route::get('cap-nhat/{id}/{loai}/{cate}',[LoaiHinhAnhController::class, 'capnhatLoaiHinhAnh'])->name('loadCapNhatLoaiHinhAnh');
            Route::post('cap-nhat/{id}/{loai}/{cate}',[LoaiHinhAnhController::class, 'xulyCapNhatLoaiHinhAnh'])->name('xulyCapNhatLoaiHinhAnh');
            Route::get('xoa/{id}/{loai}/{cate}',[LoaiHinhAnhController::class, 'xoaLoaiHinhAnh'])->name('xoaLoaiHinhAnh');
        });
    
    });

});
