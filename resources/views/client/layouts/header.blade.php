<?php
use App\Http\Controllers\Clients\TrangChuController;
?>

<div class="header__block">
    <div class="wrap-content">
        <div class="header__block-inner">
            <div class="logo-banner-head">
                <div class="logo-head">
                    <a href="{{ route('TrangChu') }}">
                        @if (TrangChuController::logo()!=false)                            
                        <img src="{{ asset('upload/loaihinhanh/' . TrangChuController::logo()->hinh_anh) }}" alt="Tiệm giày cũ Quận 12">
                        @else
                        <img src="{{ asset('adminbuild/images/noimage.png') }}" alt="" />
                        @endif
                    </a>
                </div>
                <div class="banner-head">
                    <a  href="{{ route('TrangChu') }}">
                        @if (TrangChuController::banner()!=false)                            
                        <img src="{{ asset('upload/loaihinhanh/' . TrangChuController::banner()->hinh_anh) }}" alt="Tiệm giày cũ Quận 12">
                        @else
                        <img src="{{ asset('adminbuild/images/noimage.png') }}" alt="" />
                        @endif
                    </a>
                </div>
            </div>
            
            <div class="header__block--middle">
                <form action="{{ route('search_index') }}" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="search__block">
                        <input type="text" class="search__input" name="key_search_index" placeholder="Nhập từ khóa của bạn...">
                        <input type="submit" class="btn_search_index">
                    </div>
                </form>
            </div>
            <div class="header__block--right d-flex justify-content-between align-items-center">
                <div class="header__info">
                    <a class="header__info-inner" href="tel:0339311897" title="Gọi ngay">
                        <div class="header__info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                            </svg>
                        </div>
                        <div class="header__info-content">
                            <div class="header__hotline-title --color-black">Hotline</div>
                            <div class="header__hotline-number --color-red">0777 046 925</div>
                        </div>
                    </a>
                </div>
                <!-- <div class="header__info">
                    <a class="header__info-inner">
                        <div class="header__info-icon">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 22.52L26 21.174V2H2V25.79L9.095 24.425C9.03237 24.2921 8.99993 24.1469 9 24V16C9 15.7348 9.10536 15.4804 9.29289 15.2929C9.48043 15.1054 9.73478 15 10 15H18C18.2652 15 18.5196 15.1054 18.7071 15.2929C18.8946 15.4804 19 15.7348 19 16V22.52ZM17 22.905V17H11V24C11 24.02 11 24.04 10.998 24.059L17 22.905ZM1 0H27C27.2652 0 27.5196 0.105357 27.7071 0.292893C27.8946 0.48043 28 0.734784 28 1V22C28 22.2324 27.919 22.4576 27.771 22.6368C27.623 22.816 27.4172 22.9381 27.189 22.982L1.189 27.982C1.04431 28.0098 0.89526 28.0054 0.752502 27.9689C0.609744 27.9324 0.476808 27.8649 0.363202 27.7711C0.249597 27.6772 0.158129 27.5595 0.0953412 27.4262C0.0325533 27.2929 -3.37575e-06 27.1473 2.62534e-10 27V1C2.62534e-10 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0ZM6 7.998V4H22V7.998H6Z" fill="black"></path>
                            </svg>
                        </div>
                        <div class="header__info-content">
                            <div class="header__hotline-title --color-black">Cửa hàng giày cũ</div>
                            <div class="header__hotline-number --color-red">Uy tín bật nhất</div>
                        </div>
                    </a>
                </div> -->
                <div class="header__info">
                    <a class="header__info-inner" href="{{ route('cart') }}" title="Giỏ hàng khách hàng">
                        <div class="header__info-icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div>
                        <div class="header__info-content">
                            <div class="header__cart-title --color-red">Giỏ hàng</div>
                            <div class="header__cart-title --color-black">Khách hàng</div>
                        </div>
                    </a>
                </div>
                <div class="header__info">
                    <div class="header__info-inner has-account">
                        <div class="header__info-icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </div>
                        <div class="header__info-content">
                            @if (Auth::guard('client')->user())
                            <a href="{{ route('clientInfo') }}">Xin chào {{ Auth::guard('client')->user()->ho_ten }}</a>
                            <a class="header__account-logout --color-red d-block" href="{{ route('handleClientLogout') }}" title="Đăng xuất">Đăng xuất</a>
                            @else
                            <a class="header__account-sign-in --color-red d-block" href="{{ route('clientLogin') }}" title="Đăng nhập">Đăng nhập</a>
                            <a class="header__account-register --color-black d-block" href="{{ route('clientRegister') }}" title="Đăng ký">Đăng ký</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>