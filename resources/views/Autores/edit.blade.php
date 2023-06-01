@extends('layouts.base')
@section('content')
    <form action="/autores/{{ $autor->codigo }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$autor->nombre}}">
        </div>
        <a class="btn btn-primary" href="/autores">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection