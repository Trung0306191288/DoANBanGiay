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
                    <a href="{{ route('LayDsDanhMucCapMot') }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Danh mục cấp một</a>
                </li>
                <li>
                    <a href="{{ route('LayDsDanhMucCapHai') }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Danh mục cấp hai</a>
                </li>
                <li>
                    <a href="{{ route('LayDsThuongHieu') }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Thương hiệu</a>
                </li>
                <li>
                    <a href="{{ route('LayDsKichThuoc') }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Kích thước</a>
                </li>
                <li>
                    <a href="{{ route('LayDsMauSac') }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Màu sắc</a>
                </li>
                <li>
                    <a href="{{ route('LayDsSanPham') }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Sản phẩm</a>
                </li>
            </ul>
        </li>   
        <li>
            <a href="{{ route('LayDsDonHang') }}"><ion-icon name="bag-handle-outline"></ion-icon><span>Quản lý Đơn hàng</span></a>
        </li> 
        <li>
            <p data-vitri="2">
                <a class="a_menu"><ion-icon name="people-outline"></ion-icon><span>Quản lý Tài khoản</span></a>
                <ion-icon class="left" name="chevron-back-outline"></ion-icon>
                <ion-icon class="down" name="chevron-down-outline"></ion-icon>
            </p>
            <ul class="ul_child ul_child_2">
                @if(Auth::guard('user')->user()->vai_tro == 0)
                    <li>
                        <a href="{{ route('member_admins') }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Tài khoản Quản trị</a>
                    </li>
                @endif
                {{-- <li>
                    <a href="{{ route('cate_members') }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Danh mục Tài Khoản</a>
                </li> --}}
                <li>
                    <a href="{{ route('member_client') }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Tài khoản Thành viên</a>
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
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'logo','cate' => 'static']) }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Logo</a>
                </li>
                <li>
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'banner','cate' => 'static']) }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Banner</a>
                </li>
                <li>
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'slider','cate' => 'man']) }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Slider</a>
                </li>  
                <li>
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'social','cate' => 'man']) }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Mạng xã hội</a>
                </li> 
                <li>
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'quang-cao','cate' => 'man']) }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Quảng Cáo</a>
                </li>
                <li>
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'khong-gian-quan','cate' => 'man']) }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Không gian quán</a>
                </li> 
                <li>
                    <a href="{{ route('LayDsLoaiHinhAnh',['loai' => 'video-slide','cate' => 'video']) }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Video</a>
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
                    <a href="{{ route('bai_viets',['type' => 'tin-tuc']) }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Tin tức</a>
                </li>
                <li>
                    <a href="{{ route('bai_viets',['type' => 'tieu-chi']) }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Tiêu chí</a>
                </li>
                <li>
                    <a href="{{ route('bai_viets',['type' => 'chinh-sach']) }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Chính sách</a>
                </li>
                <li>
                    <a href="{{ route('bai_viets',['type' => 'payments']) }}"><ion-icon name="caret-forward-circle-outline"></ion-icon>Hình thức thanh toán</a>
                </li>
            </ul>
        </li>
        <li><a href="{{ route('LayDsCauHinhChung') }}"><ion-icon name="settings-outline"></ion-icon><span>Cấu hình chung</span></a></li>
        <li><a href="{{ route('dangxuat') }}"><ion-icon name="return-up-back-outline"></ion-icon><span>Đăng xuất</span></a></li>
    </ul>   
</div> 