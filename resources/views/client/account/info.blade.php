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
                            <label class="account__label client-info__label" for="ho_ten">Họ và tên</label>
                            <input class="account__input" id="ho_ten" name="ho_ten" type="text"
                                value="{{ $clientInfo->ho_ten }}" placeholder="Họ và tên">
                        </div>
                    </div>
                    <div class="account__input-item">
                        <div class="account__input-item has-valid">
                            <label class="account__label client-info__label" for="dien_thoai">Số điện thoại</label>
                            <input class="account__input hidden-spin" id="dien_thoai" name="dien_thoai" type="number"
                                value="{{ $clientInfo->dien_thoai }}" placeholder="0123456789"
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
                        <label class="account__label client-info__label" for="dia_chi">Địa chỉ</label>
                        <input class="account__input" id="dia_chi" name="dia_chi" type="dia_chi"
                            value="{{ $clientInfo->dia_chi }}" placeholder="example@gmail.com"
                            oninvalid="this.setCustomValidity('Vui lòng điền vào trường này')"
                            oninput="setCustomValidity('')">
                    </div>
                    <div class="account__input-item">
                        <label class="account__label client-info__label" for="nam_sinh">Ngày sinh</label>
                        <input class="account__input" id="nam_sinh" max="{{ $nowDate }}" name="nam_sinh"
                            type="date" value="{{ $clientInfo->nam_sinh }}"
                            placeholder="____________&) 9   0        c00000000000000vb0000000dd/yyyy"
                            value="{{ $clientInfo->nam_sinh }}" placeholder="____________/dd/yyyy"
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
