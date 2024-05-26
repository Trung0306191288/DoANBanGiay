@extends('client.account.index')
@section('content')
    <div class="account-section">
        <section class="account">
            <a class="account__return-home" href="{{ route('clientIndex') }}" title="Về trang chủ">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a>
            <div class="account__inner">
                <div class="account__title general__title">
                    <h2>Đăng ký nhanh</h2>
                </div>
                <form class="account__form" method="post" action="{{ route('handleClientRegister') }}">
                    <div class="account__input-list">
                        <div class="account__input-item">
                            <div class="account__input-item has-valid">
                                <input class="account__input" id="username" name="username" type="text" value="{{ old('username') }}"
                                placeholder="abcd" oninvalid="this.setCustomValidity('Vui lòng điền vào trường này')"
                                oninput="setCustomValidity('')" required>
                            <label class="account__label" for="username">Tên người dùng</label>
                            </div>
                            @error('username')
                            <span class="account-validate">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="account__input-item">
                            <input class="account__input" id="email" name="email" type="email" value="{{ old('email') }}"
                                placeholder="example@gmail.com"
                                oninvalid="this.setCustomValidity('Vui lòng điền vào trường này')"
                                oninput="setCustomValidity('')" required>
                            <label class="account__label" for="email">Email</label>
                        </div>
                        <div class="account__input-item">
                            <div class="account__input-item has-valid">
                                <input class="account__input hidden-spin" id="dien_thoai" name="dien_thoai" type="number"
                                    value="{{ old('dien_thoai') }}" placeholder="0123456789" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                    minlength="10" maxlength="11"
                                    oninvalid="this.setCustomValidity('Vui lòng điền vào trường này')"
                                    oninput="setCustomValidity('')" required>
                                <label class="account__label" for="dien_thoai">Số điện thoại</label>
                            </div>
                            <span class="account-validate"></span>
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
                        <div class="account__input-item">
                            <div class="account__input-item is-password">
                                <input class="account__input" id="comfirm-password" type="password" value=""
                                    placeholder="abc123!@#"
                                    oninvalid="this.setCustomValidity('Vui lòng điền vào trường này')"
                                    oninput="setCustomValidity('')" required>
                                <label class="account__label" for="comfirm-password">Xác nhận mật khẩu</label>
                                <i class="account__input-icon">
                                    <ion-icon name="eye-off-outline"></ion-icon>
                                </i>
                            </div>
                            <span class="account-validate"></span>
                        </div>                        
                    </div>
                    <div class="account__button-item">
                        {{-- <button type="reset" class="account__button">Nhập lại</button> --}}
                        @csrf
                        <button type="submit" id="register-button" name="register" value="register"
                            class="account__button">Đăng ký</button>
                    </div>
                    <div class="account__info mt-3">
                        Bạn đã có tài khoản? Đăng nhập
                        <a class="account__transfer"href="{{ route('clientLogin') }}">
                            tại đây
                        </a>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
