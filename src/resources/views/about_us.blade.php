<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>About us</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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

<main>
    <div class="container">
        <section class="section min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="pagetitle">
                <h1>Acerca del proyecto</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("landing") }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Acerca de</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="row">
                <div class="row text-center">
                    <p class="text-muted">Lexbib es un proyecto enfocado y dirigido hacia el sistema de educación para los abogados y estudiantes de Derecho en el Ecuador.</p>
                    <p class="text-muted">Esta propuesta surgió por la carencia de implementos educativos en nuestro país, con la iniciativa de buscar nuevos horizontes que permitan acortar caminos lejanos para obtener información y experiencias prácticas del Derecho, siendo accesible para todos quiénes utilicen este innovador recurso.</p>
                    <p class="text-muted">¡Bienvenidos a Lexbib!</p>
                </div>
            </div>

            <a href="{{ route("landing") }}" class="btn btn-outline-secondary" role="button"
               aria-disabled="true"><i class="bx bx-rotate-left"></i>Regresar</a>
            <hr>
            <div class="copyright">
                &copy; Copyright <strong><span>{{ config('app.name', 'Laravel') }}</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Created by <a href="https://lanistek.com" target="_blank">Lanistek</a>
            </div>
        </section>
    </div>
</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
</body>

</html>
