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

<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route("landing") }}" class="logo d-flex">
            <span class="d-print-none d-lg-block"> {{ config('app.name', 'Laravel') }}</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>

    </div>
    <div class="search-bar">
        <div class="row">

            <div class="col-lg-9 col-sm-12 col-xs-12 col-md-8">
                <form class="search-form d-flex align-items-right" method="GET" action="{{ route('landing') }}">
                    <input type="text" name="q" placeholder="Buscar videos, casos y m&aacute;s" title="Enter search
                keyword" value="{{$q}}">
                    <button type="submit" title="Buscar"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="showOnlyPodcasts">
                    <label class="form-check-label" for="showOnlyPodcasts">Mostrar solo podcasts</label>
                </div>
            </div>
        </div>

    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>
        </ul>
    </nav><!-- End Icons Navigation -->
</header>
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @if(isset($tags))
            @foreach($tags as $tag)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("landing", ['tag' => $tag->title] )}}">
                        <i class="bi bi-tags"></i>
                        <span>{{$tag->title}}</span>
                    </a>
                </li>
            @endforeach
        @endif
        <hr>
        <li class="nav-item">
            <a class="nav-link" href="{{ route("about_us" )}}">
                <i class="bi bi-info-circle"></i>
                <span>Acerca del proyecto</span>
            </a>
        </li>
    </ul>
</aside>
<main id="main" class="main">
    <div class="col-lg-12">
        <div class="row">
            @if(isset($posts))
                @foreach($posts as $post)
                    <div data-type="posts" class="col-lg-3 col-xs-12 col-sm-12 col-md-6" style="margin-bottom: 10px;">
                        <div class="card h-100">
                            <div class="card-header text-bg-primary text-center text-white">
                                Video
                            </div>
                            <div class="card-body">
                                <div class="embed-responsive embed-responsive-36by9">
                                    <iframe src="{{$post->getVimeoUrl()}}" style="width: 100%"
                                            height="360"></iframe>
                                </div>
                                <h5 class="card-title">{{$post->title}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Subido el:&nbsp;{{$post->created_at}}</h6>
                                <p class="card-text"><a href="{{ route("posts.show", ['uuid' => $post->uuid] )}}"
                                                        class="btn btn-primary stretched-link"><i class="bi
                                                        bi-book"></i>&nbsp;Leer m&aacute;s sobre el caso</a></p>
                            </div>
                            <div class="card-footer text-muted">
                                <span class="text-muted">Tags:</span>
                                @foreach($post->tags as $tag)
                                    <a href="{{ route("landing", ['tag' => $tag->title] )}}"
                                       class="card-link">{{$tag->title}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if(isset($podcasts))
                @foreach($podcasts as $podcast)
                    <div data-type="podcasts" class="col-lg-3 col-xs-12 col-sm-12 col-md-6" style="margin-bottom:
                    10px;">
                        <div class="card h-100">
                            <div class="card-header text-bg-primary text-center text-white">
                                Podcast
                            </div>
                            <div class="card-body">
                                @if(!is_null($podcast->getVimeoUrl()))
                                    <div class="embed-responsive embed-responsive-36by9">
                                        <iframe src="{{$podcast->getVimeoUrl()}}" style="width: 100%"
                                                height="360"></iframe>
                                    </div>
                                @else
                                    <img class="img-fluid" style=" height: 365px;" src="{{ asset
                                    ('assets/img/product-5.jpg') }}" alt="">
                                @endif
                                <h5 class="card-title">{{$podcast->title}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Subido el:&nbsp;{{$podcast->created_at}}</h6>
                                <p class="card-text"><a href="{{ route("podcasts.show", ['uuid' => $podcast->uuid] )}}"
                                                        class="btn btn-primary stretched-link"><i class="bi
                                                        bi-mic-fill"></i>&nbsp;Escuchar m&aacute;s sobre el caso</a></p>
                            </div>
                            <div class="card-footer">
                                <span class="text-muted">Tags:</span>
                                @foreach($podcast->tags as $tag)
                                    <a href="{{ route("landing", ['tag' => $tag->title] )}}"
                                       class="card-link">{{$tag->title}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <hr>
        <div class="row">
            {{ $posts->links('vendor.pagination.default') }}
        </div>
    </div>
</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<footer id="footer fixed-bottom" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>{{ config('app.name', 'Laravel') }}</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Created by <a href="https://lanistek.com" target="_blank">Lanistek</a>
    </div>
</footer>
<script src="{{{ URL::asset('assets/vendor/apexcharts/apexcharts.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/chart.js/chart.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/echarts/echarts.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/quill/quill.min.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/simple-datatables/simple-datatables.js')}}}"></script>
<script src="{{{ URL::asset('assets/vendor/tinymce/tinymce.min.js')}}}"></script>
<script src="{{{ URL::asset('js/main.js')}}}"></script>
<script>
    $(document).ready(function () {
        $('#showOnlyPodcasts').change(function () {
            if (this.checked) {
                $("div").find(`[data-type='posts']`).hide();
            } else {
                $("div").find(`[data-type='posts']`).show();
            }
        });
    });
</script>
</body>
</html>

