@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route("tags.create") }}" class="btn btn-outline-primary" role="button"
                   aria-disabled="true">
                    <i class="fa fa-save"></i>&nbsp;Crear Tag
                </a>
            </div>
        </div>
        <hr class="hr"/>
        <div class="row">
            <div class="table-responsive">
                <table class="table" id="list_tags">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th scope="col">Título</th>
                        <th scope="col">Meta título</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Contexto</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag )
                        <tr>
                            <th>{{$tag->id}}</th>
                            <th scope="row">{{$tag->title}}</th>
                            <th>{{$tag->meta_title}}</th>
                            <th>{{$tag->slug}}</th>
                            <th>{{$tag->context}}</th>
                            <th>
                                <a href="{{ route("tags.edit", ['id' => $tag->id] )}}" class="btn
                                btn-outline-primary" role="button"
                                   aria-disabled="true">
                                    <i class="fa fa-edit"></i>&nbsp;Editar
                                </a>
                            </th>
                            <th>
                                <a href="{{ route("tags.delete", ['id' => $tag->id] )}}" class=".delete_tag btn
                                btn-outline-danger" role="button" onclick="return confirm('¿Estás seguro de borrar ' +
                                 'este tag?')"
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
