@extends('layouts.base')
@section('content')
    <form action="/libros" method="POST">
        @csrf
          <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo">
          </div>
          <div class="form-group">
            <label for="paginas">Páginas:</label>
            <input type="number" class="form-control" id="paginas" name="paginas">
          </div>
          <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" class="form-control" id="isbn" name="isbn">
          </div>
          <div class="form-group">
            <label for="editorial">Editorial:</label>
            <input type="text" class="form-control" id="editorial" name="editorial">
          </div>
          <div class="form-group">
            <label for="autor">Autor:</label>
            <select class="form-control" id="autor" name="autor">
                @foreach($autores as $autor)
                    <option value="{{$autor->codigo}}">{{$autor->nombre}}</option>
                @endforeach

            </select>
          </div>
        <a class="btn btn-primary" href="/libros">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection