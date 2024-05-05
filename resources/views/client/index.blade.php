<!DOCTYPE html>
<html lang="vi">
@include('client.layouts.head')

<body>
    <div class="body-container">
        <header id="primary-header">
            <div class="header">
                @include('client.layouts.header')
                @include('client.layouts.menu')
            </div>
        </header>
        <main id="primary-main" class="top-space">           
            @yield('content')
        </main>
        <footer id="primary-footer">
            @include('client.layouts.footer')
        </footer>
        <div class="alert-box">
            <div class="alert-title"></div>
            <span class="alert-close">&times;</span>
        </div>
    </div>
    @include('client.layouts.js')
    @yield('script')
</body>

</html>
