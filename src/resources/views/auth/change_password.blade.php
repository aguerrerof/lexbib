@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page_title">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Cambiar Contrase&nacute;a</li>
                </ol>
            </nav>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-info" role="alert">
                {{ session('message') }}
            </div>
        @endif
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
            <form id="new_post_form" method="POST" action="#">
                @csrf
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-group mb-0">
                            <label for="title">Nueva Contrase&nacute;a</label>
                            <input id="new_password" type="password" class="form-control" name="new_password" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-0">
                            <label for="link">Confirmar Contrase&nacute;a</label>
                            <input id="new_confirm_password" type="password" class="form-control"
                                   name="new_confirm_password" required>
                        </div>
                    </div>
                </div>
                <hr class="hr"/>
                <div class="row form-group mb-0">
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bxs-save"></i></i>&nbsp;&nbsp;
                            Actualizar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
