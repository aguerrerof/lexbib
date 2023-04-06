<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Font Awesome icons (free version)-->
    <script src="{{{ URL::asset('landing/js/all.js')}}}"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
          type="text/css"/>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{{ URL::asset('landing/css/styles.css')}}}" rel="stylesheet"/>
    <script src="https://open.spotify.com/embed-podcast/iframe-api/v1" async></script>
</head>
<body>
@include('landing.header');
<div class="container px-4 px-lg-5">
    <div class="row">
        <div class="form-outline">
            <form class="d-flex align-items-right" method="GET" action="{{ route('landing') }}">
                <input type="text" id="q" name="q" class="form-control" placeholder="Buscar videos, casos y m&aacute;s"
                       aria-label="Search"/>
                <button type="submit" class="btn btn-primary" title="Buscar"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <hr class="my-4"/>
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
                                <span><i class="fa-brands fa-twitter"></i>&nbsp;</span><span>Twitter</span>
                            </a>
                            <a class="btn btn-outline-primary" href="{{$socialLinks['facebook']}}" target="_blank">
                                <span><i class="fa-brands fa-facebook"></i>&nbsp;</span><span>Facebook</span>
                            </a>
                            <a class="btn btn-outline-primary" href="{{$socialLinks['linkedin']}}" target="_blank">
                                <span> <i class="fa-brands fa-linkedin"></i></span>&nbsp;<span>Linkedin</span>
                            </a>
                            <a class="btn btn-outline-primary" href="{{$socialLinks['telegram']}}" target="_blank">
                                <span> <i class="fa-brands fa-telegram"></i></span>&nbsp;<span>Telegram</span>
                            </a>
                            <a class="btn btn-outline-primary" href="{{$socialLinks['skype']}}" target="_blank">
                                <span> <i class="fa-brands fa-skype"></i></span>&nbsp;<span>Skype</span>
                            </a>
                            <a class="btn btn-outline-success" href="{{$socialLinks['whatsapp']}}" target="_blank">
                                <span> <i class="fa-brands fa-whatsapp"></i></span>&nbsp;<span>Whatsapp</span>
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
                        active">{{ucwords($tag->title)}}</a><br>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
{!! seo() !!}
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
@include('landing.footer')
@include('google_analytics')
</body>
</html>
