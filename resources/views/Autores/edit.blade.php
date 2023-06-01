@extends('layouts.base')
@section('content')
    <a class="btn btn-primary" href="/autores">Regresar</a>
    <form action="/autores/{{ $autor->codigo }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$autor->nombre}}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection