<!DOCTYPE html>
<html lang="vi">
@include('admin.layouts.head')
    <body>
        <div class="wrap-admin-login" id="particles-js">
            <div class="wrap-content">
                <div class="login-view-website text-sm"><a href="../" target="_blank" title="Xem website"><ion-icon name="return-up-back-outline"></ion-icon>Xem website</a></div>
                <div class="wrap-login"> 
                    <div class="box-form-login">
                        <div class="title_login">Đăng nhập hệ thống</div>
                        <form action="{{ route('dangnhap') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="box_input">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Tài khoản">
                            </div>
                            <div class="box_input">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                            </div>
                            <div class="btn_login">
                                <input type="submit" class="btn btn-primary" value="Đăng nhập">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="login-copyright text-sm">Powered by <a href="" target="_blank" title="Designed by Nina.vn">Designed by Q.Trung - Q.Tánh</a></div>
            </div>
            <div class="count-particles">
                <span class="js-count-particles"></span>
            </div> 
        </div>
        @include('admin.layouts.js')
    </body>
</html>

