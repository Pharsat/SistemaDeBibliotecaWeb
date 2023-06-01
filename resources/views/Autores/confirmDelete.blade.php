@extends('layouts.base')
@section('content')
    ¿Desea eliminar el autor: {{ $autor->nombre }}?
    <br>
    <br>
    <form action="/autores/{{ $autor->codigo }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a class="btn btn-primary" href="/autores">Regresar</a>
    </form>
@endsection