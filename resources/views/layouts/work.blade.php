{{-- 실험용 임시 view 생성 --}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
    <title>@yield('title', '게임소프트웨어학과 졸업 작품')</title>

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Styles -->
@hasSection('css')
    @yield('css')
@else
    <link href="/css/styles.css" rel="stylesheet">
@endif

@hasSection('head')
    @yield('head')
@endif
</head>
<body>
    <main class="flex-shrink-0">
        <!-- Navigation-->
@hasSection('navigation')
        @yield('navigation')
@else
@include('layouts.navigation')
@endif
@hasSection('header')
        <!-- Header-->
        @yield('header')
@endif
@hasSection('section')
        <!-- Section -->
        @yield('section')
@endif
    </main>
    <!-- Footer-->
    @hasSection('footer')
    @yield('footer')
    @else
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; 중부대학교 게임소프트웨어학과 2022</p></div>
    </footer>
    @endif
    <!-- Bootstrap core JS-->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <!-- Scripts -->
    @hasSection('script')
    @yield('script')
    @else
    <script src="/js/scripts.js" defer></script>
    @endif
</body>
</html>