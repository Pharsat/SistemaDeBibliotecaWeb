@extends('layouts.base')
@section('content')
    @if(isset($error))
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endif
    <table class="table table-striped">
    <thead>
        <tr>
            <th colspan="4">
                <a class="btn btn-primary" href="/autores/create">Crear</a>
            </th>
        </tr>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($autores as $autor)
            <tr>
                <td>{{$autor->codigo}}</td>
                <td>{{$autor->nombre}}</td>
                <td><a class="btn btn-primary" href="/autores/{{$autor->codigo}}/edit">Editar</a></td>
                <td><a class="btn btn-danger" href="/autores/{{$autor->codigo}}/confirmDelete">Eliminar</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection