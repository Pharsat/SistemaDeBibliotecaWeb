@extends('layouts.base')
@section('content')
    @if ($errors != null && $errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/autores" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <a class="btn btn-primary" href="/autores">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection