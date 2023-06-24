<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentarios;
use Illuminate\Support\Facades\Validator;

class ApiSampleController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comentario' => 'required|string|max:255',
            'calificacion' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $data = $validator->validated();

        $comentario = new Comentarios();//JObject
        $comentario->comentario = $data['comentario'];
        $comentario->calificacion = $data['calificacion'];
        $comentario->save();

        return response()->json($comentario, 201);//Created
    }

    public function get()
    {
        return response()->json(Comentarios::all(), 200);
    }

    public function getById(string $id)
    {
        $comentario = Comentarios::find($id);
        
        if ($comentario === null) {
            return response()->json(['message' => 'Comentario not found'], 404);
        }

        return response()->json($comentario, 200);
    }

    public function update(Request $request, string $id)
    {
        $comentario = Comentarios::find($id);
        
        if ($comentario === null) {
            return response()->json(['message' => 'Comentario not found'], 404);
        }

        $data = $request->validate([
            'comentario' => 'required|string|max:255',
            'calificacion' => 'required|integer',
        ]);
    
        $comentario->comentario = $data['comentario'];
        $comentario->calificacion = $data['calificacion'];
        $comentario->save();

        return response()->json($comentario, 200);
    }

    public function patch(Request $request, string $id)
    {
        $comentario = Comentarios::find($id);
    
        if ($comentario === null) {
            return response()->json(['message' => 'Comentario not found'], 404);
        }
    
        //note sometimes
        $data = $request->validate([
            'comentario' => 'sometimes|required|string|max:255',
            'calificacion' => 'sometimes|required|integer',
        ]);
    
        if (isset($data['comentario'])) {
            $comentario->comentario = $data['comentario'];
        }
    
        if (isset($data['calificacion'])) {
            $comentario->calificacion = $data['calificacion'];
        }
    
        $comentario->save();
    
        return response()->json($comentario, 200);
    }

    public function delete(string $id)
    {
        $comentario = Comentarios::find($id);
    
        if ($comentario === null) {
            return response()->json(['message' => 'Comentario not found'], 404);
        }
    
        $comentario->delete();
    
        return response(null, 204);
    }

    //HEAD is used to get properties of a binary resourse before to require it.
    // https://www.geeksforgeeks.org/10-most-common-http-status-codes/ 
}
