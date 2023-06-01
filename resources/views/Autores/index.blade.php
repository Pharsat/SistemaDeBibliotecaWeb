@extends('layouts.base')
@section('content')
    <table class="table table-striped">
    <thead>
        <tr>
            <th colspan="3">
                <a class="btn btn-primary" href="/autores/create">Crear</a>
            </th>
        </tr>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($autores as $autor)
            <tr>
                <td>{{$autor->codigo}}</td>
                <td>{{$autor->nombre}}</td>
                <td><a class="btn btn-primary" href="/autores/{{$autor->codigo}}/edit">Editar</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection