@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route("podcasts.index") }}" class="btn btn-outline-secondary" role="button"
                   aria-disabled="true">
                    <i class="bx bx-rotate-left"></i>&nbsp;Regresar
                </a>
            </div>
        </div>
        @if($errors->any())
            <hr class="hr"/>
            <div class="alert alert-danger" role="alert">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <hr class="hr"/>
        <div class="row">
            <form id="new_post_form" method="POST" action="{{route('podcasts.update',$podcast->id)}}">
                @csrf
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <div class="form-group mb-0">
                            <label for="title">Título</label>
                            <input id="title" type="text" class="form-control" name="title" required value="{{ old
                            ('title',$podcast->title) }}">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-group mb-0">
                            <label for="link_podcast">Link del podcast</label>
                            <input id="link_podcast" type="url" class="form-control" name="link_podcast" required
                                   value="{{old('link_podcast',$podcast->link_podcast)}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-0">
                            <label for="link">Link del video</label>
                            <input id="link" type="url" class="form-control" name="link" value="{{ old
                            ('link',$podcast->link) }}">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="form-group mb-0">
                            <label for="description">Contenido</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                                      required>{{old('description',$podcast->description)}}</textarea>
                        </div>
                    </div>
                </div>
                <hr class="hr"/>
                <div class="col-12">
                    <div class="form-group mb-0">
                        <label for="select_tags">Tags</label>
                        <select class="form-control multi-select-search" id="select_tags_update" name="tags[]"
                                required>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach

                        </select>
                </div>
                <hr class="hr"/>
                <div class="row form-group mb-0">
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bxs-save"></i></i>&nbsp;&nbsp;
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
