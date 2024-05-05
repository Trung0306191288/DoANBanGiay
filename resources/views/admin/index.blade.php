<!DOCTYPE html>
<html lang="vi">
@include('admin.layouts.head')
<body>
    <div class="wap_main">
        <div class="flex_main">
            <div class="left_nav_menu">
                @include('admin.layouts.nav_menu')
            </div>
            <div class="right_nav_menu">
                @include('admin.layouts.header')
                <div class="container_main">
                    @yield('body')
                </div>
                @include('admin.layouts.footer')
            </div>          
        </div>
    </div>
    @include('admin.layouts.js')
</body>
</html>