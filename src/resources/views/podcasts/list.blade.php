@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="alert alert-primary" role="alert">
                Solo se pueden visualizar los podcasts creados por este usuario
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route("podcasts.new") }}" class="btn btn-outline-primary" role="button"
                   aria-disabled="true">
                    <i class="bx bxs-save"></i>&nbsp;Crear Podcast
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
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($podcasts as $podcast )
                        <tr>
                            <th>{{$podcast->id}}</th>
                            <th scope="row">{{$podcast->title}}</th>
                            <th>{{substr($podcast->description,0,100)}}</th>
                            <th>{{$podcast->created_at}}</th>
                            <th>{{$podcast->deleted_at ? 'Inactivo':'Activo'}}</th>
                            <th> <a href="{{ route("podcasts.show", ['uuid' => $podcast->uuid] )}}"  target="_blank"
                                    class="btn
                                btn-outline-primary" role="button"
                                    aria-disabled="true">
                                    <i class="bx bxs-show"></i>&nbsp;Ver
                                </a></th>
                            <th>
                                <a href="{{ route("podcasts.edit", ['id' => $podcast->id] )}}" class="btn
                                btn-outline-primary" role="button"
                                   aria-disabled="true">
                                    <i class="bx bxs-edit"></i>&nbsp;Editar
                                </a>
                            </th>
                            <th>
                                @if($podcast->deleted_at)
                                    <a href="{{ route("podcasts.delete", ['id' => $podcast->id] )}}" class=".delete_tag btn
                                btn-outline-danger disabled">
                                        <i class="fa fa-trash"></i>&nbsp;Eliminar
                                    </a>
                                @else
                                    <a href="{{ route("podcasts.delete", ['id' => $podcast->id] )}}" class=".delete_tag btn
                                btn-outline-danger" role="button" onclick="return confirm('¿Estás seguro de borrar ' +
                                 'este podcast?')"
                                       aria-disabled="true">
                                        <i class="bx bxs-trash"></i>&nbsp;Eliminar
                                    </a>
                                @endif

                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
