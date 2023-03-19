<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- DataTable -->
    <script type="text/javascript" src="{{{ URL::asset('js/jquery.min.js')}}}"></script>
    <script src="{{{ URL::asset('assets/DataTables/js/jquery.dataTables.min.js')}}}"></script>
    <script src="{{{ URL::asset('assets/DataTables/js/dataTables.bootstrap.min.js')}}}"></script>

    <link href="{{ asset('assets/DataTables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!--Templates -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="stylesheet">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

</head>
<body>
<!-- ======= Header ======= -->
@auth
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route("dashboard") }}" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block"> {{ config('app.name', 'Laravel') }}</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <nav class="header-nav ms-auto">
            <!-- Authentication Links -->

            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <span class="d-none d-md-block ps-2">
                        <i class="ri ri-user-2-fill"></i> Usuario:&nbsp;{{ ucwords(Auth::user()->name) }}
                    </span>
                </li><!-- End Profile Nav -->

            </ul>

        </nav>

    </header><!-- End Header -->
@endauth
@auth
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route("tags.index") }}">
                    <i class="bi bi-grid"></i>
                    <span>Tags</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route("posts.index") }}">
                    <i class="bi bi-file-earmark-post"></i>
                    <span>Posts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("podcasts.index") }}">
                    <i class="bi bi-music-note"></i>
                    <span>Podcasts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("users.list") }}">
                    <i class="bi bi-people"></i>
                    <span>Usuarios (administradores)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("me.new_password") }}">
                    <i class="bi bi-person"></i>
                    <span>{{ __('Cambiar mi contraseña') }}</span>
                </a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit()">
                    <i class="ri ri-logout-box-line"></i> {{ __('Cerrar sesión') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </aside><!-- End Sidebar-->
@endauth
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            @yield('content')
        </div>
    </section>

</main>
<!-- ======= Footer ======= -->
<footer id="footer fixed-bottom" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>{{ config('app.name', 'Laravel') }}</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Created by <a href="https://lanistek.com" target="_blank">Lanistek</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{{ URL::asset('assets/vendor/apexcharts/apexcharts.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/chart.js/chart.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/echarts/echarts.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/quill/quill.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/simple-datatables/simple-datatables.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/tinymce/tinymce.min.js')}}}"></script>
<script src="{{{ URL::asset('js/main.js')}}}"></script>
</body>
</html>
