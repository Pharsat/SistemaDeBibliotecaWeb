<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutorModel;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Autores.index',[
            'autores' => AutorModel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Autores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        $autor->delete();

        return redirect('/autores');
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
