@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a  href="{{ route("tags.create") }}" class="btn btn-outline-primary" role="button"
                    aria-disabled="true">
                    <i class="fa fa-save"></i>&nbsp;Crear Tag
                </a>
            </div>
        </div>
        <hr class="hr" />
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
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
                            <th scope="row">{{$tag->title}}</th>
                            <th>{{$tag->meta_title}}</th>
                            <th>{{$tag->slug}}</th>
                            <th>{{$tag->context}}</th>
                            <th>
                                <button type="button" class="btn btn-outline-primary" data-toggle="button"
                                        aria-pressed="false" autocomplete="off">
                                    <i class="fa fa-edit"></i>&nbsp;Editar
                                </button>
                            </th>
                            <th>
                                <button type="button" class="btn btn-outline-danger" data-toggle="button"
                                        aria-pressed="false" autocomplete="off">
                                    <i class="fa fa-trash"></i>&nbsp;Eliminar
                                </button>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.table').DataTable();
        });
    </script>
@endsection
