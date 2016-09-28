<!doctype html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @include('admin.layouts.head')
    @yield('style')
</head>
<body>
    <div class="header">
        @include('admin.layouts.header')
    </div>

    <div class="page-content">
        <div class="row">
            <div class="col-md-2"  style=" height: 486px">
                @include('admin.layouts.navbar')
            </div>
            <div class="col-md-10">
                @yield('main_template')
            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
    @yield('script')
</body>
</html>