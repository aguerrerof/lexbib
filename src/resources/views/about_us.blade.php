<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Font Awesome icons (free version)-->
    <script src="{{{ URL::asset('landing/js/all.js')}}}"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{{ URL::asset('landing/css/styles.css')}}}" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route("landing") }}">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route("landing") }}">Home</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Page Header-->
<header class="masthead" style="background-image: url({{{ URL::asset('landing/assets/img/about-us.jpg')}}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>{{ config('app.name', 'Laravel') }}</h1>
                    <span class="subheading">by Lanistek</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p class="text-muted">Lexbib es un proyecto enfocado y dirigido hacia el sistema de educación para los abogados y estudiantes de Derecho en el Ecuador.</p>
                <p class="text-muted">Esta propuesta surgió por la carencia de implementos educativos en nuestro país, con la iniciativa de buscar nuevos horizontes que permitan acortar caminos lejanos para obtener información y experiencias prácticas del Derecho, siendo accesible para todos quiénes utilicen este innovador recurso.</p>
                <p class="text-muted">¡Bienvenidos a Lexbib!</p>
            </div>
        </div>
    </div>
</main>
<!-- Footer-->
<footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://twitter.com/lexbib_ec" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/lanistek" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                        </a>
                    </li>
                </ul>
                <div class="small text-center text-muted fst-italic"> &copy; Copyright <strong><span>{{ config('app.name', 'Laravel') }}</span></strong>. All Rights Reserved</div>
                <div class="small text-center text-muted fst-italic"> Created by <a href="https://lanistek.com" target="_blank">Lanistek</a></div>
            </div>
        </div>
    </div>
</footer>
<script src="{{{ URL::asset('landing/js/bootstrap.bundle.min.js')}}}"></script>
<script src="{{{ URL::asset('landing/js/scripts.js')}}}"></script>
@include('google_analytics')
</body>
</html>
