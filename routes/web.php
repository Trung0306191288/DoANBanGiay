<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Admin
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\FunctionsController;
use App\Http\Controllers\DanhMucCapMotController;
use App\Http\Controllers\DanhMucCapHaiController;
use App\Http\Controllers\ThuongHieuController;
use App\Http\Controllers\KichThuocController;
use App\Http\Controllers\MauSacController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\LoaiHinhAnhController;

// Client
use App\Http\Controllers\Clients\TrangChuController;
use App\Http\Controllers\Clients\ChiTietSanPhamController;
use App\Http\Controllers\Clients\GioHangController;



// Auth::routes();


// Client
Route::prefix('/')->group(function () {
    Route::get('/',[TrangChuController::class, 'index'])->name('TrangChu');
    Route::get('danh-muc/{name_list}/{id_list}',[TrangChuController::class, 'categoryListPage'])->name('categoriesList');
    Route::get('danh-muc/{name_list}/{id_list}/{name_cat}/{id_cat}',[TrangChuController::class, 'categoryCatPage'])->name('categoriesCat');
    Route::get('search_index',[TrangChuController::class, 'timkiemTheoSanPham'])->name('search_index');

   //Trang trong , chi tiết sản phẩm
    Route::get('san-pham/{id}',[ChiTietSanPhamController::class, 'index'])->name('productDetailPage');
    Route::get('load_price',[ChiTietSanPhamController::class,  'loadPrice'])->name('ajaxLoadPrice');


    Route::controller(GioHangController::class)->group(function () {
        Route::get('thong-bao', function () {
            return view('client.cart.notification', ['pageName' => 'Thông báo']);
        })->name('notification');
        Route::get('add-to-cart/{id}', 'addToCart')->name('add.to.cart');
        Route::patch('update-cart', 'update')->name('update.cart');
        Route::delete('remove-from-cart', 'remove')->name('remove.from.cart');

        Route::group(['middleware' => ['guest']], function () {
            Route::get('gio-hang', 'cart')->name('cart');
            Route::post('thanh-toan/{code}', 'payment')->name('payment');
            Route::get('thong-tin-don-hang/{id}', 'orderInfo')->name('orderInfo');
        });
    });
});


Route::get('/admin/login', function () {
    return view('admin.login');
});
Route::post('/admin/login', [DangNhapController::class, 'DangNhap'])->name('dangnhap');

Route::prefix('/admin')->group(function () {
    // Tài khoàn Admin
    Route::group(['middleware' => ['AuthChecker:admin']], function () {
        Route::get('/', [DashboardController::class, 'DanhSach'])->name('dashboard');
        Route::get('/admin/logout', [DangNhapController::class, 'DangXuat'])->name('dangxuat');
        Route::get('/doi-mat-khau-admin', [DangNhapController::class, 'doi_mat_khau_admin'])->name('doi_mat_khau_admin');
        Route::post('/doi-mat-khau-admin', [DangNhapController::class, 'xu_ly_doi_mat_khau_admin'])->name('xu_ly_doi_mat_khau_admin');

        // Các Hàm xử lý load ajax , ...
        Route::get('loadcapmot', [FunctionsController::class, 'LoadCapMot'])->name('loadcapmot');
        Route::get('loadsanpham', [FunctionsController::class, 'LoadSanPham'])->name('loadsanpham');
        Route::get('ajax_deletegallery', [FunctionsController::class, 'xoaHinhAnhCon'])->name('ajax_deletegallery');

        // Thêm xóa sửa danh mục cấp một
        Route::prefix('/danh-muc-cap-mot')->group(function () {
            Route::get('/', [DanhMucCapMotController::class ,'DanhSach'])->name('LayDsDanhMucCapMot');
            Route::get('them', [DanhMucCapMotController::class ,'themDanhMucCapMot'])->name('loadThemDanhMucCapMot');
            Route::post('them', [DanhMucCapMotController::class ,'xulyThemDanhMucCapMot'])->name('xulyThemDanhMucCapMot');
            Route::get('cap-nhat/{id}', [DanhMucCapMotController::class ,'capnhatDanhMucCapMot'])->name('loadCapNhatDanhMucCapMot');
            Route::patch('cap-nhat/{id}', [DanhMucCapMotController::class ,'xulyCapNhatDanhMucCapMot'])->name('xulyCapNhatDanhMucCapMot');
            Route::get('xoa/{id}', [DanhMucCapMotController::class ,'xoaDanhMucCapMot'])->name('xoaDanhMucCapMot');
            Route::get('tim-kiem', [DanhMucCapMotController::class ,'timkiemDanhMucCapMot'])->name('timkiemdanhmuccapmot');
        });

        // Thêm xóa sửa danh mục cấp hai
        Route::prefix('/danh-muc-cap-hai')->group(function () {
            Route::get('/', [DanhMucCapHaiController::class ,'DanhSach'])->name('LayDsDanhMucCapHai');
            Route::get('them', [DanhMucCapHaiController::class ,'themDanhMucCapHai'])->name('loadThemDanhMucCapHai');
            Route::post('them', [DanhMucCapHaiController::class ,'xulyThemDanhMucCapHai'])->name('xulyThemDanhMucCapHai');
            Route::get('cap-nhat/{id}', [DanhMucCapHaiController::class ,'capnhatDanhMucCapHai'])->name('loadCapNhatDanhMucCapHai');
            Route::patch('cap-nhat/{id}', [DanhMucCapHaiController::class ,'xulyCapNhatDanhMucCapHai'])->name('xulyCapNhatDanhMucCapHai');
            Route::get('xoa/{id}', [DanhMucCapHaiController::class ,'xoaDanhMucCapHai'])->name('xoaDanhMucCapHai');
            Route::get('tim-kiem', [DanhMucCapHaiController::class ,'timkiemDanhMucCapHai'])->name('timkiemdanhmuccaphai');
        });

        // Thêm xóa sửa thương hiệu
        Route::prefix('/thuong-hieu')->group(function () {
            Route::get('/', [ThuongHieuController::class ,'DanhSach'])->name('LayDsThuongHieu');
            Route::get('them', [ThuongHieuController::class ,'themThuongHieu'])->name('loadThemThuongHieu');
            Route::post('them', [ThuongHieuController::class ,'xulyThemThuongHieu'])->name('xulyThemThuongHieu');
            Route::get('cap-nhat/{id}', [ThuongHieuController::class ,'capnhatThuongHieu'])->name('loadCapNhatThuongHieu');
            Route::patch('cap-nhat/{id}', [ThuongHieuController::class ,'xulyCapNhatThuongHieu'])->name('xulyCapNhatThuongHieu');
            Route::get('xoa/{id}', [ThuongHieuController::class ,'xoaThuonghieu'])->name('xoaThuongHieu');
            Route::get('tim-kiem', [ThuongHieuController::class ,'timkiemThuongHieu'])->name('timkiemthuonghieu');
        });

        // Thêm xóa sửa kích thước
        Route::prefix('/kich-thuoc')->group(function () {
            Route::get('/', [KichThuocController::class,'DanhSach'])->name('LayDsKichThuoc');
            Route::get('them', [KichThuocController::class,'themKichThuoc'])->name('loadThemKichThuoc');
            Route::post('them',  [KichThuocController::class,'xulyThemKichThuoc'])->name('xulyThemKichThuoc');
            Route::get('cap-nhat/{id}', [KichThuocController::class,'capnhatKichThuoc'])->name('loadCapNhatKichThuoc');
            Route::post('cap-nhat/{id}',  [KichThuocController::class,'xulyCapNhatKichThuoc'])->name('xulyCapNhatKichThuoc');
            Route::get('xoa/{id}',  [KichThuocController::class,'xoaKichThuoc'])->name('xoaKichThuoc');
            Route::get('tim-kiem', [KichThuocController::class, 'timkiemKichThuoc'])->name('timkiemkichthuoc');
        });

        Route::prefix('/mau-sac')->group(function () {
            Route::get('/', [MauSacController::class,'DanhSach'])->name('LayDsMauSac');
            Route::get('them', [MauSacController::class,'themMauSac'])->name('loadThemMauSac');
            Route::post('them',  [MauSacController::class,'xulyThemMauSac'])->name('xulyThemMauSac');
            Route::get('cap-nhat/{id}', [MauSacController::class,'capnhatMauSac'])->name('loadCapNhatMauSac');
            Route::post('cap-nhat/{id}',  [MauSacController::class,'xulyCapNhatMauSac'])->name('xulyCapNhatMauSac');
            Route::get('xoa/{id}',  [MauSacController::class,'xoaMauSac'])->name('xoaMauSac');
            Route::get('tim-kiem', [MauSacController::class, 'timkiemMauSac'])->name('timkiemmausac');
        });

       
        Route::prefix('/san-pham')->group(function () {
            Route::get('/', [SanPhamController::class,'DanhSach'])->name('LayDsSanPham');
            Route::get('them',[SanPhamController::class, 'themSanPham'])->name('loadThemSanPham');
            Route::post('them',[SanPhamController::class, 'xulyThemSanPham'])->name('xulyThemSanPham');
            Route::get('cap-nhat/{id}', [SanPhamController::class,'capnhatSanPham'])->name('loadCapNhatSanPham');
            Route::post('cap-nhat/{id}',[SanPhamController::class, 'xulyCapNhatSanPham'])->name('xulyCapNhatSanPham');
            Route::get('xoa/{id}', [SanPhamController::class,'xoaSanPham'])->name('xoaSanPham');
            Route::get('tim-kiem',[SanPhamController::class, 'timkiemSanPham'])->name('timkiemsanpham');
        });

        
        Route::prefix('/don-hang')->group(function () {
            Route::get('/',[DonHangController::class,  'DanhSach'])->name('LayDsDonHang');
            Route::get('chi-tiet-don-hang/{id}',[DonHangController::class,  'loadDonHang'])->name('loaddonhang');
            Route::post('chi-tiet-don-hang/{id}',[DonHangController::class,  'capnhatDonHang'])->name('capnhatdonhang');
            Route::get('xoa/{id}',[DonHangController::class,  'xoaDonHang'])->name('xoadonhang');
            Route::get('tim-kiem',[DonHangController::class,  'timkiemDonHang'])->name('timkiemdonhang');
        });

        
        Route::prefix('/loai-hinh-anh')->group(function () {
            Route::get('/{loai}/{cate}',[LoaiHinhAnhController::class, 'DanhSach'])->name('LayDsLoaiHinhAnh');
            Route::get('them/{loai}/{cate}',[LoaiHinhAnhController::class, 'themLoaiHinhAnh'])->name('loadThemLoaiHinhAnh');
            Route::post('them/{loai}/{cate}',[LoaiHinhAnhController::class, 'xulyThemLoaiHinhAnh'])->name('xulyThemLoaiHinhAnh');
            Route::get('cap-nhat/{id}/{loai}/{cate}',[LoaiHinhAnhController::class, 'capnhatLoaiHinhAnh'])->name('loadCapNhatLoaiHinhAnh');
            Route::post('cap-nhat/{id}/{loai}/{cate}',[LoaiHinhAnhController::class, 'xulyCapNhatLoaiHinhAnh'])->name('xulyCapNhatLoaiHinhAnh');
            Route::get('xoa/{id}/{loai}/{cate}',[LoaiHinhAnhController::class, 'xoaLoaiHinhAnh'])->name('xoaLoaiHinhAnh');
        });
    
    });

});
