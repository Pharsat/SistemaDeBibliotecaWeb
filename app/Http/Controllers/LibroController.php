<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LibroModel;
use App\Models\AutorModel;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Libros.index',[
            'libros' => LibroModel::select('libro.*', 'autor.nombre as autor_nombre')
            ->join('autor', 'libro.autor_codigo', '=', 'autor.codigo')
            ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Libros.create',[
            'autores' => AutorModel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $libro = new LibroModel();
        $libro->titulo = $request->get('titulo');
        $libro->paginas = $request->get('paginas');
        $libro->ISBN = $request->get('isbn');
        $libro->editorial = $request->get('editorial');
        $libro->autor_codigo = $request->get('autor');
        $libro->save();

        return redirect('/libros');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $codigo)
    {
        return view('Libros.edit',[
            'libro' => LibroModel::find($codigo),
            'autores' => AutorModel::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $codigo)
    {
        $libro = LibroModel::find($codigo);
        $libro->titulo = $request->get('titulo');
        $libro->paginas = $request->get('paginas');
        $libro->ISBN = $request->get('isbn');
        $libro->editorial = $request->get('editorial');
        $libro->autor_codigo = $request->get('autor');
        $libro->save();

        return redirect('/libros');
    }

    /**
     * redirects to confirm deletion page.
     */
    public function confirmDelete(string $codigo)
    {
        return view('Libros.confirmDelete',[
            'libro' => LibroModel::find($codigo)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo)
    {
        $libro = LibroModel::find($codigo);
        $libro->delete();

        return redirect('/libros');
    }
}
