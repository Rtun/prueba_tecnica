<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $modulo = Modulo::where('status', 'AC')->get();

            return response()->json([
                'Mensaje' => 'Esta es la lista de modulos: ',
                'modulos' => $modulo
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'Mensaje' => 'Hubo un error al obtener los registros',
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $r)
    {
        $context = $r->all();
        try {
           $modulo = new Modulo();
           $modulo->name = $context['name'];
           $modulo->save();

           return response()->json([
               'Mensaje' => 'Modulo creado correctamente',
               'status' => true,
           ], 201);
        } catch (\Throwable $e) {
           // throw $e;
           return response()->json([
               'Mensaje' => 'Hubo un error al intentar guardar el modulo',
               'error Completo' => $e,
           ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $context = $r->all();

        try {
            $modulo = Modulo::find($id);
            $modulo->name = $context['name'];
            $modulo->save();

            return response()->json([
                'Mensaje' => 'El modulo '.$modulo->name.' Se actualizo correctamente',
                'status' => true
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'Mensaje' => 'Hubo un error al intentar actualizar el modulo',
                'status' => false
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $modulo = Modulo::find($id);
            $modulo->status = 'BJ';
            $modulo->save();

            return response()->json([
                'Mensaje' => 'El modulo '.$modulo->name.' fue eliminado con exito',
                'status' => true
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'Mensaje' => 'Hubo un error al intentar eliminar el modulo',
                'status' => false,
            ]);
        }
    }
}
