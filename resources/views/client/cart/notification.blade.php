@extends('client.index')
@section('content')
    <div class="wrap-main">
        <section class="cart-info">
            <div class="cart-info__inner">
                <div class="cart-info__head mb-4">
                    <h2 class="cart-info__title">Bạn cần đăng nhập để xem giỏ hàng</h2>
                </div>
                <div class="cart-info__button-list">
                    <a href="{{ route('clientIndex') }}" class="cart-info__button-item cart-info__button-home">Về trang chủ</a>
                    <a href="{{ route('clientLogin') }}" class="cart-info__button-item cart-info__button-login">Đăng nhập ngay</a>
                </div>
            </div>
        </section>
    </div>
@endsection
