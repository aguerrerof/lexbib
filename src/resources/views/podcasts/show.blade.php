<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{$podcast->title}}</title>
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
    <!-- Spotify -->
    <script src="https://open.spotify.com/embed-podcast/iframe-api/v1" async></script>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

</head>

<body>
<header id="header" class="header d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route("landing") }}" class="logo d-flex align-items-center">
            <span class="d-print-none d-lg-block"> {{ config('app.name', 'Laravel') }}</span>
        </a>
    </div><!-- End Logo -->

</header>
<div class="container">
    <div class="col">
        <div class="page_title">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route("landing") }}">Inicio</a></li>
                    <li class="breadcrumb-item active">{{$podcast->title}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-12 col-md-6 col-sm-12">
            <div class="embed-responsive embed-responsive-16by9">
                <div id="embed-iframe"></div>
            </div>
        </div>
        <div class="col-lg-12 col-xs-12 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="description">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Descripci&oacute;n
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="description"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{$podcast->description}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <div class="pt-4 d-flex flex-column align-items-center">
                        <div class="social-links mt-0">
                            <a class="btn btn-outline-info" href="{{$socialLinks['twitter']}}" target="_blank">
                                <span><i class="bi bi-twitter"></i>&nbsp;</span><span>Twitter</span>
                            </a>
                            <a class="btn btn-outline-primary" href="{{$socialLinks['facebook']}}" target="_blank">
                                <span> <i class="bi bi-facebook"></i></span>&nbsp;<span>Facebook</span>
                            </a>
                            <a class="btn btn-outline-primary" href="{{$socialLinks['linkedin']}}" target="_blank">
                                <span> <i class="bi bi-linkedin"></i></span>&nbsp;<span>Linkedin</span>
                            </a>
                            <a class="btn btn-outline-primary" href="{{$socialLinks['telegram']}}" target="_blank">
                                <span> <i class="bi bi-telegram"></i></span>&nbsp;<span>Telegram</span>
                            </a>
                            <a class="btn btn-outline-primary" href="{{$socialLinks['skype']}}" target="_blank">
                                <span> <i class="bi bi-skype"></i></span>&nbsp;<span>Skype</span>
                            </a>
                            <a class="btn btn-outline-success" href="{{$socialLinks['whatsapp']}}" target="_blank">
                                <span> <i class="bi bi-whatsapp"></i></span>&nbsp;<span>Whatsapp</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!is_null($link))
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="{{$link}}" style="width: 100%" height="360"
                            allow="autoplay; fullscreen"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    @endif
    @if(isset($tags))
        <hr>
        <div class="container bcontent">
            <h6>Tags</h6>
            <ul class="nav nav-pills">
                @foreach($tags as $tag)
                    <li class="nav-item" style="margin-left: 5px;">
                        <a href="{{ route("landing", ['tag' => $tag->title] )}}" class="nav-link
                        active">{{$tag->title}}</a><br>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

</div>

{!! seo() !!}
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
</body>
<footer id="footer fixed-bottom" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>{{ config('app.name', 'Laravel') }}</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Created by <a href="https://lanistek.com" target="_blank">Lanistek</a>
    </div>
</footer><!-- End Footer -->
<!-- Vendor JS Files -->
<script>
    window.onSpotifyIframeApiReady = (IFrameAPI) => {
        let element = document.getElementById('embed-iframe');
        let options = {
            uri: '{{$podcast->link_podcast}}',
        };
        let callback = (EmbedController) => {
        };
        IFrameAPI.createController(element, options, callback);
    };
</script>
<script src="{{{ URL::asset('assets/vendor/apexcharts/apexcharts.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/chart.js/chart.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/echarts/echarts.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/quill/quill.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/simple-datatables/simple-datatables.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/tinymce/tinymce.min.js')}}}"></script>
<script src="{{{ URL::asset('js/main.js')}}}"></script>
@include('google_analytics')
</html>
