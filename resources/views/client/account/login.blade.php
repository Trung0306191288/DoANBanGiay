@extends('client.account.index')
@section('content')
    <div class="account-section">
        <section class="account">
            <a class="account__return-home" href="{{ route('TrangChu') }}" title="Về trang chủ">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a>
            <div class="account__inner">
                <div class="account__title general__title">
                    <h2>Đăng nhập</h2>
                </div>
                <form class="account__form" method="post" action="">
                    <div class="account__input-list">
                        <div class="account__input-item">
                            <input class="account__input" id="username" name="username" type="text"
                                value="{{ old('username') }}" placeholder="username"
                                oninvalid="this.setCustomValidity('Vui lòng điền vào trường này')"
                                oninput="setCustomValidity('')" required>
                            <label class="account__label" for="username">Tên đăng nhập</label>
                        </div>
                        <div class="account__input-item">
                            <div class="account__input-item is-password">
                                <input class="account__input" id="password" name="password" type="password" value=""
                                    placeholder="abc123!@#"
                                    oninvalid="this.setCustomValidity('Vui lòng điền vào trường này')"
                                    oninput="setCustomValidity('')" required>
                                <label class="account__label" for="password">Mật khẩu</label>
                                <i class="account__input-icon">
                                    <ion-icon name="eye-off-outline"></ion-icon>
                                </i>
                            </div>
                        </div>                        
                    </div>
                    @if (session('status'))
                            <span class="account-validate">{{ session('status') }}</span>
                        @endif
                        <div class="account__button-item">
                            @csrf
                            <button type="submit" name="login" value="login" class="account__button">Đăng nhập</button>
                        </div>
                        <div class="account__info mt-3">
                            Bạn chưa có tài khoản? Đăng ký nhanh
                            <a class="account__transfer"href="{{ route('clientRegister') }}">
                                tại đây
                            </a>
                        </div>
                </form>
            </div>
        </section>
    </div>
@endsection
