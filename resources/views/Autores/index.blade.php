@extends('layouts.base')
@section('content')
    <table class="table table-striped">
    <thead>
        <tr>
            <th colspan="2">
                <a class="btn btn-primary" href="autor/create">Crear</a>
            </th>
        </tr>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach($autores as $autor)
            <tr>
                <td>{{$autor->codigo}}</td>
                <td>{{$autor->nombre}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection