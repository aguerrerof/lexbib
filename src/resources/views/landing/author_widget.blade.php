<section style="background-image: url({{{ URL::asset('landing/assets/img/background.jpg')}}})">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center ">
            <div class="col-12">
                <div class="card" style="border-radius: 15px;">

                    <div class="card-body p-4">
                        <div class="d-flex text-black">
                            <div class="flex">
                                <a href="{{ route("author.show", ['uuid' => $author->uuid] )}}">
                                    <img src="{{$author->photo_url}}"
                                         alt="{{$author->full_name}}" class="img-fluid"
                                         style="width: 180px; border-radius: 10px;"/>
                                </a>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1"><a
                                        href="{{ route("author.show", ['uuid' => $author->uuid] )}}">{{$author->full_name}}</a>
                                </h5>
                                <p class="mb-2 pb-1" style="color: #2b2a2a;">
                                    Autor
                                </p>
                                <div class="d-flex justify-content-start rounded-3"
                                     style="background-color: #efefef;">
                                    <div>
                                        <p class="small text-muted mb-1">
                                            Podcasts
                                        </p>
                                        <p class="mb-0">{{$author->user->podcasts->count()}}</p>
                                    </div>
                                    <div class="px-3">
                                        <p class="small text-muted mb-1">
                                            Art&iacute;culos
                                        </p>
                                        <p class="mb-0">{{$author->user->posts->count()}}</p>
                                    </div>
                                </div>
                                <div class="d-flex pt-1">
                                    <div class="social-links mt-2">
                                        <a class="btn btn-outline-info" href="{{$author->twitter_url}}" target="_blank">
                                            <span><i class="fa-brands fa-twitter"></i>&nbsp;</span><span>Twitter</span>
                                        </a>
                                        <a class="btn btn-outline-primary" href="{{$author->facebook_url}}"
                                           target="_blank">
                                            <span><i
                                                    class="fa-brands fa-facebook"></i>&nbsp;</span><span>Facebook</span>
                                        </a>
                                        <a class="btn btn-outline-primary" href="{{$author->linkedin_url}}"
                                           target="_blank">
                                            <span> <i
                                                    class="fa-brands fa-linkedin"></i></span>&nbsp;<span>Linkedin</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
