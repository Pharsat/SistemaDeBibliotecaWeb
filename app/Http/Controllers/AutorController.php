<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutorModel;
use App\Models\LibroModel;
use Illuminate\Support\Facades\Validator;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Autores.index',[
            'autores' => AutorModel::all(),
            'error' => session('error')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Autores.create', [
            'errors' => session('errors')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:50|',
        ]);
    
        if ($validator->fails()) {
            return redirect('autores/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $autor = new AutorModel();
        $autor->nombre = $request->get('nombre');
        $autor->save();

        return redirect('/autores');
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
        return view('Autores.edit',[
            'autor' => AutorModel::find($codigo)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $codigo)
    {
        $autor = AutorModel::find($codigo);
        $autor->nombre = $request->get('nombre');
        $autor->save();

        return redirect('/autores');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo)
    {
        $autor = AutorModel::find($codigo);
        
        $libros = LibroModel::select('*')
        ->where('autor_codigo', $codigo)
        ->get();

        if ($libros->count() > 0) {
            //return redirect()->action([self::class, 'index'],  ['error' => 'No puedes eliminar un autor con libros asociados en el sistema.']);
            return redirect()->action([self::class, 'index'])->with('error', 'No puedes eliminar un autor con libros asociados en el sistema.');
        } else {
            $autor->delete();
            return redirect('/autores');
        }
    }

    /**
     * redirects to confirm deletion page.
     */
    public function confirmDelete(string $codigo)
    {
        return view('Autores.confirmDelete',[
            'autor' => AutorModel::find($codigo)
        ]);
    }
}
