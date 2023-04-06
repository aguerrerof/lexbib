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
@include('landing.header');
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
@include('landing.footer')
@include('google_analytics')
</body>
</html>
