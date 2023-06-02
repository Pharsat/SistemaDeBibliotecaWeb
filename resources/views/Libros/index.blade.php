@extends('layouts.base')
@section('content')
    <table class="table table-striped">
    <thead>
        <tr>
            <th colspan="8">
                <a class="btn btn-primary" href="/libros/create">Crear</a>
            </th>
        </tr>
        <tr>
            <th>Codigo</th>
            <th>Titulo</th>
            <th>Páginas</th>
            <th>ISBN</th>
            <th>Editorial</th>
            <th>Autor</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($libros as $libro)
            <tr>
                <td>{{$libro->codigo}}</td>
                <td>{{$libro->titulo}}</td>
                <td>{{$libro->pagina}}</td>
                <td>{{$libro->ISBN}}</td>
                <td>{{$libro->editorial}}</td>
                <td>{{$libro->autor}}</td>
                <td><a class="btn btn-primary" href="/autores/{{$autor->codigo}}/edit">Editar</a></td>
                <td><a class="btn btn-danger" href="/autores/{{$autor->codigo}}/confirmDelete">Eliminar</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection