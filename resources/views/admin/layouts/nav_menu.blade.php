<div class="fixed_menu_bar">
    <div class="logo_main">
        <a href="#">
            <img src="{{ asset('adminbuild/images/logo-web.png') }}" width="50" height="50" alt="">
        </a>
        
        <div class="tab_zoom">
            <ion-icon name="reorder-four-outline"></ion-icon>
        </div>
    </div>
    <ul class="list_nav_menu">
        <li>
            <a href="{{ route('dashboard') }}"><ion-icon name="speedometer-outline"></ion-icon><span>Bảng điều khiển</span></a>
            
        </li> 
        <li>
            <p data-vitri="1">
                <a class="a_menu"><ion-icon name="storefront-outline"></ion-icon><span>Quản lý Sản Phẩm</span></a>
                <ion-icon class="left" name="chevron-back-outline"></ion-icon>
                <ion-icon class="down" name="chevron-down-outline"></ion-icon>
            </p>
            <ul class="ul_child ul_child_1">
                <li>
                    <a href="{{ route('LayDsDanhMucCapMot') }}">Quản lý Danh mục cấp một</a>
                </li>
                <li>
                    <a href="{{ route('LayDsDanhMucCapHai') }}">Quản lý Danh mục cấp hai</a>
                </li>
                <li>
                    {{-- <a href="{{ route('products') }}">Sản phẩm</a> --}}
                    <a>Sản phẩm</a>
                </li>
                <li>
                    <a href="{{ route('LayDsThuongHieu') }}">Quản lý thương hiệu</a>
                </li>
                <li>
                    <a href="{{ route('LayDsKichThuoc') }}">Quản lý kích thước</a>
                </li>
                <li>
                    <a href="{{ route('LayDsMauSac') }}">Quản lý màu sắc</a>
                </li>
            </ul>
        </li>   
        {{-- <li>
            <a href="{{ route('orders') }}"><ion-icon name="construct-outline"></ion-icon><span>Quản lý Đơn hàng</span></a>
        </li>  --}}
        <li>
            <p data-vitri="2">
                <a class="a_menu"><ion-icon name="people-outline"></ion-icon><span>Quản lý Tài khoản</span></a>
                <ion-icon class="left" name="chevron-back-outline"></ion-icon>
                <ion-icon class="down" name="chevron-down-outline"></ion-icon>
            </p>
            <ul class="ul_child ul_child_2">
                @if(Auth::guard('user')->user()->vai_tro == 0)
                    <li>
                        <a href="{{ route('member_admins') }}">Tài khoản Quản trị</a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('cate_members') }}">Danh mục Tài Khoản</a>
                </li>
                <li>
                    <a href="{{ route('member_client') }}">Tài khoản Thành viên</a>
                </li>
            </ul>
        </li>   
        <li>
            <p data-vitri="3">
                <a class="a_menu"><ion-icon name="images-outline"></ion-icon><span>Quản lý Hình ảnh</span></a>
                <ion-icon class="left" name="chevron-back-outline"></ion-icon>
                <ion-icon class="down" name="chevron-down-outline"></ion-icon>
            </p>
            <ul class="ul_child ul_child_3">
                <li>
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'logo','cate' => 'static']) }}">Logo</a>
                </li>
                <li>
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'banner','cate' => 'static']) }}">Banner</a>
                </li>
                <li>
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'slider','cate' => 'man']) }}">Slider</a>
                </li>  
                <li>
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'social','cate' => 'man']) }}">Mạng xã hội</a>
                </li> 
                <li>
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'quang-cao','cate' => 'man']) }}">Quảng Cáo</a>
                </li>
                <li>
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'khong-gian-quan','cate' => 'man']) }}">Không gian quán</a>
                </li> 
                <li>
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'video-slide','cate' => 'video']) }}">Video</a>
                </li>
            </ul>
        </li>      
        <li>
            <p data-vitri="4">
                <a class="a_menu"><ion-icon name="newspaper-outline"></ion-icon><span>Quản lý Bài viết</span></a>
                <ion-icon class="left" name="chevron-back-outline"></ion-icon>
                <ion-icon class="down" name="chevron-down-outline"></ion-icon>
            </p>
            <ul class="ul_child ul_child_4">
                <li>
                    <a href="{{ route('bai_viets',['type' => 'tin-tuc']) }}">Tin tức</a>
                </li>
                <li>
                    <a href="{{ route('bai_viets',['type' => 'tieu-chi']) }}">Tiêu chí</a>
                </li>
                <li>
                    <a href="{{ route('bai_viets',['type' => 'danh-gia']) }}">Feedback</a>
                </li> 
                <li>
                    <a href="{{ route('bai_viets',['type' => 'chinh-sach']) }}">Chính sách</a>
                </li>
                <li>
                    <a href="{{ route('bai_viets',['type' => 'payments']) }}">Hình thức thanh toán</a>
                </li>
            </ul>
        </li>
        
        {{-- <li>
            <a href="{{ route('statistical') }}"><ion-icon name="construct-outline"></ion-icon><span>Quản lý thống kê</span></a>
        </li> --}}
        <li><a href="{{ route('xu_ly_doi_mat_khau_admin') }}"><ion-icon name="key-outline"></ion-icon><span>Đổi mật khẩu</span></a></li>
        <li><a href="{{ route('dangxuat') }}"><ion-icon name="return-up-back-outline"></ion-icon><span>Đăng xuất</span></a></li>
    </ul>   
</div> 