<div class="header_main">
    <div class="title_main"><span><ion-icon name="settings-outline"></ion-icon></span> {{ $TieuDe }}</div>
    <div class="box_noti_avt">
        <div class="container_avt">
            <div class="flex_avt">
                <a href="{{ route('loadupdatemember_admins',['id' => Auth::guard('user')->user()->id]) }}">Xin chào, {{ Auth::guard('user')->user()->ho_ten }}</a>
                <img src="{{ (Auth::guard('user')->user()->hinh_anh != NULL)? asset('upload/member_admins/'.Auth::guard('user')->user()->hinh_anh) : asset('adminbuild/images/552721.png') }}" width="35" height="35" alt="">
            </div>
            <ul class="ul_avt">
                <li><a href="{{ route('loadupdatemember_admins',['id' => Auth::guard('user')->user()->id]) }}">Quản lí thông tin</a></li>
                <li><a href="{{ route('doi_mat_khau_admin') }}">đổi mật khẩu</a></li>
                <li><a href="{{ route('dangxuat') }}">Đăng xuất</a></li>
            </ul>
        </div>
        @if(session('noti') != NULL)
            <div class="arlert_tong">
                <ion-icon name="checkmark-circle-outline"></ion-icon> {{ session('noti') }}
            </div>
        @endif
    </div>
</div>