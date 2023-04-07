<section style="background-image: url({{{ URL::asset('landing/assets/img/background.jpg')}}})">
    <div class="container py-5 h-50">
        <div class="row justify-content-center align-items-center ">
            <div class="col-12">
                <div class="card" style="border-radius: 15px;">

                    <div class="card-body p-1">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
