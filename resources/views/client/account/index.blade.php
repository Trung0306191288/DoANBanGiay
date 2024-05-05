<!DOCTYPE html>
<html lang="vi">
    @include('client.layouts.css')
<body>
    <main id="main-primary">
        @yield('content')
    </main>
    @include('client.layouts.js')
</body>
</html>