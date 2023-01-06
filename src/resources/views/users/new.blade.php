@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route("users.list") }}" class="btn btn-outline-secondary" role="button"
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
            <form id="new_post_form" method="POST" action="{{route('posts.save')}}">
                @csrf
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-group mb-0">
                            <label for="name">Nombre</label>
                            <input id="name" type="text" class="form-control" name="name" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-0">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-6">

                        <div class="form-group mb-0">
                            <label for="title">Contrase&nacute;a</label>
                            <div class="input-group" id="show_hide_password">
                                <input id="new_password" type="password" class="form-control password" name="new_password"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-0">
                            <label for="link">Confirmar Contrase&nacute;a</label>
                            <input id="new_confirm_password" type="password" class="form-control password"
                                   name="new_confirm_password" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-6">
                        <input type="checkbox" class="form-check-inline" id="show_password">
                        {{__('Mostrar contraseña')}}
                    </div>
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
