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
</head>
<body>
@include('landing.header');
<div class="container px-4 px-lg-5">
    <div class="row">
        <div class="form-outline">
            <form class="d-flex align-items-right" method="GET" action="{{ route('landing') }}">
                <input type="text" id="q" name="q" class="form-control" placeholder="Buscar videos, casos y m&aacute;s"
                       aria-label="Search" value="{{$q}}"/>
                <button type="submit" class="btn btn-primary" title="Buscar"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <hr class="my-4"/>
    <div class="row gx-4 gx-lg-12 justify-content-center">
        <div class="col-lg-12">
            <div class="row">
                @if(isset($podcasts))
                    @foreach($podcasts as $podcast)
                        <div data-type="podcasts" class="col-lg-4 col-xs-12 col-sm-12 col-md-6" style="margin-bottom:
                    10px;">
                            <div class="card h-100">
                                <div class="card-header text-bg-primary text-center text-white">
                                    Podcast
                                </div>
                                <div class="card-body text-center">
                                    @if(!is_null($podcast->getVimeoUrl()))
                                        <div class="embed-responsive embed-responsive-36by9">
                                            <iframe src="{{$podcast->getVimeoUrl()}}" style="width: 100%"
                                                    height="360"></iframe>
                                        </div>
                                    @else
                                        <img class="img-fluid" style=" height: 365px;" src="{{ asset
                                    ('assets/img/product-5.jpg') }}" alt="">

                                    @endif
                                    <hr>
                                    <h5 class="card-title">{{$podcast->title}}</h5>

                                    <p class="card-text"><a
                                            href="{{ route("podcasts.show", ['uuid' => $podcast->uuid] )}}"
                                            class="btn btn-primary stretched-link"><i class="bi
                                                        bi-mic-fill"></i>&nbsp;Escuchar m&aacute;s sobre el caso</a></p>
                                </div>
                                <div class="card-footer">
                                    <h6 class="card-subtitle mb-2 text-muted">Subido
                                        el:&nbsp;{{$podcast->created_at}}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if(isset($posts))
                    @foreach($posts as $post)
                        <div data-type="posts" class="col-lg-4 col-xs-12 col-sm-12 col-md-6"
                             style="margin-bottom: 10px;">
                            <div class="card h-100">
                                <div class="card-header text-bg-primary text-center text-white">
                                    Video
                                </div>
                                <div class="card-body text-center">
                                    <div class="embed-responsive embed-responsive-36by9">
                                        <iframe src="{{$post->getVimeoUrl()}}" style="width: 100%"
                                                height="360"></iframe>
                                    </div>
                                    <hr>
                                    <h5 class="card-title">{{$post->title}}</h5>

                                    <p class="card-text"><a href="{{ route("posts.show", ['uuid' => $post->uuid] )}}"
                                                            class="btn btn-primary stretched-link"><i class="bi
                                                        bi-book"></i>&nbsp;Leer m&aacute;s sobre el caso</a></p>
                                </div>
                                <div class="card-footer text-muted">
                                    <h6 class="card-subtitle mb-2 text-muted">Subido el:&nbsp;{{$post->created_at}}</h6>
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
    </div>
</div>
@include('landing.footer')
@include('google_analytics')
</body>
</html>
