@extends('layouts.base')
@section('content')
    <form action="/libros/{{ $libro->codigo }}" method="POST">
        @csrf
        @method('put')
          <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{$libro->titulo}}">
          </div>
          <div class="form-group">
            <label for="paginas">Páginas:</label>
            <input type="number" class="form-control" id="paginas" name="paginas" value="{{$libro->paginas}}">
          </div>
          <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{$libro->ISBN}}">
          </div>
          <div class="form-group">
            <label for="editorial">Editorial:</label>
            <input type="text" class="form-control" id="editorial" name="editorial" value="{{$libro->editorial}}">
          </div>
          <div class="form-group">
            <label for="autor">Autor:</label>
            <select class="form-control" id="autor" name="autor" value="{{$libro->autor_codigo}}">
                @foreach($autores as $autor)
                @if($autor->codigo == $libro->autor_codigo)
                  <option value="{{$autor->codigo}}" selected>{{$autor->nombre}}</option>
                @else
                  <option value="{{$autor->codigo}}">{{$autor->nombre}}</option>
                @endif
                @endforeach
            </select>
          </div>
        <a class="btn btn-primary" href="/libros">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection