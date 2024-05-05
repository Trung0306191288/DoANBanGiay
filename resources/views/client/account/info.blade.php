@extends('client.index')
@section('content')
    <div class="wrap-main">
        <section class="client-info account">
            <div class="client-info__inner">
                <div class="client-info__title">
                    <h2>Thông tin cá nhân</h2>
                </div>
                <form class="account__form" method="post" action="{{ route('handleClientUpdate') }}">
                    <div class="account__input-item">
                        <div class="account__input-item">
                            <label class="account__label client-info__label" for="username">Tên người dùng</label>
                            <input class="account__input" id="username" name="username" type="text"
                                value="{{ $clientInfo->username }}" placeholder="abcd" disabled>
                        </div>
                    </div>
                    <div class="account__input-item">
                        <div class="account__input-item">
                            <label class="account__label client-info__label" for="fullname">Họ và tên</label>
                            <input class="account__input" id="fullname" name="fullname" type="text"
                                value="{{ $clientInfo->fullname }}" placeholder="Họ và tên">
                        </div>
                    </div>
                    <div class="account__input-item">
                        <div class="account__input-item has-valid">
                            <label class="account__label client-info__label" for="phone">Số điện thoại</label>
                            <input class="account__input hidden-spin" id="phone" name="phone" type="number"
                                value="{{ $clientInfo->phone }}" placeholder="0123456789"
                                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="10" maxlength="11"
                                oninvalid="this.setCustomValidity('Vui lòng điền vào trường này')"
                                oninput="setCustomValidity('')">
                        </div>
                        <span class="account-validate"></span>
                    </div>
                    <div class="account__input-item">
                        <label class="account__label client-info__label" for="email">Email</label>
                        <input class="account__input" id="email" name="email" type="email"
                            value="{{ $clientInfo->email }}" placeholder="example@gmail.com"
                            oninvalid="this.setCustomValidity('Vui lòng điền vào trường này')"
                            oninput="setCustomValidity('')">
                    </div>
                    <div class="account__input-item">
                        <label class="account__label client-info__label" for="address">Địa chỉ</label>
                        <input class="account__input" id="address" name="address" type="address"
                            value="{{ $clientInfo->address }}" placeholder="example@gmail.com"
                            oninvalid="this.setCustomValidity('Vui lòng điền vào trường này')"
                            oninput="setCustomValidity('')">
                    </div>
                    <div class="account__input-item">
                        <label class="account__label client-info__label" for="birthday">Ngày sinh</label>
                        <input class="account__input" id="birthday" max="{{ $nowDate }}" name="birthday"
                            type="date" value="{{ $clientInfo->birthday }}"
                            placeholder="____________&) 9   0        c00000000000000vb0000000dd/yyyy"
                            value="{{ $clientInfo->birthday }}" placeholder="____________/dd/yyyy"
                            oninvalid="this.setCustomValidity('Vui lòng điền vào trường này')"
                            oninput="setCustomValidity('')">
                    </div>
                    <div class="account__input-item">
                        <label class="account__label client-info__label" for="password">Mật khẩu</label>
                        <div class="account__input-item is-password">
                            <input class="account__input" id="password" name="password" type="password" value=""
                                placeholder="abc123!@#" oninvalid="this.setCustomValidity('Vui lòng điền vào trường này')"
                                oninput="setCustomValidity('')">
                            <i class="account__input-icon">
                                <ion-icon name="eye-off-outline"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="account__input-item">
                        <label class="account__label client-info__label" for="comfirm-password">Xác nhận mật khẩu</label>
                        <div class="account__input-item is-password">
                            <input class="account__input" id="comfirm-password" type="password" value=""
                                placeholder="abc123!@#" oninvalid="this.setCustomValidity('Vui lòng điền vào trường này')"
                                oninput="setCustomValidity('')">
                            <i class="account__input-icon">
                                <ion-icon name="eye-off-outline"></ion-icon>
                            </i>
                        </div>
                        <span class="account-validate"></span>
                    </div>
                    <div class="account__button-item">
                        @csrf
                        <button type="submit" id="register-button" name="register" value="register"
                            class="account__button">Cập nhật</button>
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
@section('script')
    @if (session('success') != null)
        <script type="text/javascript">
            $(document).ready(function() {
                AlertBoxHandMade('{{ session('success') }}', '#29bc1b');
            });
        </script>
    @endif
@endsection
