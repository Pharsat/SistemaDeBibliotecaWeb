@extends('layouts.base')
@section('content')
    ¿Desea eliminar el libro: {{ $libro->titulo }}?
    <br>
    <br>
    <form action="/libros/{{ $libro->codigo }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a class="btn btn-primary" href="/libros">Regresar</a>
    </form>
@endsection