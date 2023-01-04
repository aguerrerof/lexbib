<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="stylesheet">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="stylesheet">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <script type="text/javascript" src="{{{ URL::asset('js/jquery.min.js')}}}"></script>

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
</head>
<body>
<main id="main" class="main">
    <div class="container d-flex justify-content-center">
        <div class="input-group col-lg-12  input-group-lg">
            <input placeholder="Buscar videos, casos y más" type="text" id="search_posts" autofocus
                   class="form-control">
            <div class="input-group-append">
                <span class="input-group-text microphone"><img src="{{ asset('assets/img/search.png')
                }}"></span>
            </div>
        </div>
    </div>
</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<footer id="footer fixed-bottom" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Alexander</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Created by <a href="https://lanistek.com" target="_blank">Lanistek</a>
    </div>
</footer>

</body>
</html>

