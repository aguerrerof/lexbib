@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="alert alert-primary" role="alert">
                Solo se pueden visualizar los posts creados por este usuario
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route("posts.new") }}" class="btn btn-outline-primary" role="button"
                   aria-disabled="true">
                    <i class="bx bxs-save"></i>&nbsp;Crear Post
                </a>
            </div>
        </div>
        <hr class="hr"/>
        <div class="row">
            <div class="table-responsive">
                <table class="table" id="list_posts">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripci&oacute;n</th>
                        <th scope="col">Link del video</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post )
                        <tr>
                            <th>{{$post->id}}</th>
                            <th scope="row">{{$post->title}}</th>
                            <th>{{substr($post->description,0,100)}}</th>
                            <th>
                                <a href="{{$post->link}}" target="_blank" class="link-info">
                                    <i class="fa fa-edit"></i>&nbsp;Ver
                                </a>
                            </th>
                            <th>
                                <a href="{{ route("tags.edit", ['id' => $post->id] )}}" class="btn
                                btn-outline-primary" role="button"
                                   aria-disabled="true">
                                    <i class="fa fa-edit"></i>&nbsp;Editar
                                </a>
                            </th>
                            <th>
                                <a href="{{ route("tags.delete", ['id' => $post->id] )}}" class=".delete_tag btn
                                btn-outline-danger" role="button" onclick="return confirm('¿Estás seguro de borrar ' +
                                 'este post?')"
                                   aria-disabled="true">
                                    <i class="fa fa-trash"></i>&nbsp;Eliminar
                                </a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
