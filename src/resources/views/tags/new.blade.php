@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route("tags.index") }}" class="btn btn-outline-secondary" role="button"
                   aria-disabled="true">
                    <i class="fa fa-rotate-left"></i>&nbsp;Regresar
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
            <form id="" method="POST" action="{{route('tags.save')}}">
                @csrf
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-group mb-0">
                            <label for="title">Título</label>
                            <input id="title" type="text" class="form-control" name="title" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-0">
                            <label for="meta_title">Meta Título</label>
                            <input id="meta_title" type="text" class="form-control" name="meta_title" required>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-group mb-0">
                            <label for="slug">Slug</label>
                            <input id="slug" type="text" class="form-control" name="slug">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="form-group mb-0">
                            <label for="content">Contenido</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row form-group mb-0">
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(function () {
            $('.table').DataTable();
        });
    </script>
@endsection
