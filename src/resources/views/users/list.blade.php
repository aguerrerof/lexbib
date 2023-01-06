@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route("users.new") }}" class="btn btn-outline-primary" role="button"
                   aria-disabled="true">
                    <i class="bx bxs-save"></i>&nbsp;Crear Usuario
                </a>
            </div>
        </div>
        <hr class="hr"/>
        <div class="row">
            <div class="table-responsive">
                <table class="table" id="list_users">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fecha de creaci&oacute;n</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user )
                        <tr>
                            <th>{{$user->id}}</th>
                            <th>{{$user->name}}</th>
                            <th scope="row">{{$user->email}}</th>
                            <th>{{$user->created_at}}</th>
                            <th>
                                @if(!is_null($user->deleted_at))
                                    <a href="{{ route("users.enable", ['id' => $user->id] )}}" class="btn
                                btn-outline-success">
                                        <i class="fa-solid fa-toggle-on"></i>&nbsp;Activar
                                    </a>
                                @else
                                    <a href="{{ route("users.disable", ['id' => $user->id] )}}" class="btn
                                btn-outline-danger" role="button" onclick="return confirm('¿Estás seguro desactivar ' +
                                 'este usuario?')"
                                       aria-disabled="true">
                                        <i class="fa-solid fa-toggle-on"></i>&nbsp;Desactivar
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
