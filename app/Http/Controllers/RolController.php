<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $usuario = Rol::where('status', 'AC')->get();

            return response()->json([
                'Mensaje' => 'Esta es la lista de Roles: ',
                'Roles' => $usuario
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
            $rol = new Rol();
            $rol->name = $context['name'];
            $rol->save();

            return response()->json([
                'Mensaje' => 'Rol creado correctamente',
                'status' => true,
            ], 201);
         } catch (\Throwable $e) {
            // throw $e;
            return response()->json([
                'Mensaje' => 'Hubo un error al intentar guardar el Rol',
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
            $rol = Rol::find($id);
            $rol->name = $context['name'];
            $rol->save();

            return response()->json([
                'Mensaje' => 'El Rol '.$rol->name.' Se actualizo correctamente',
                'status' => true
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'Mensaje' => 'Hubo un error al intentar actualizar el rol',
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
            $rol = Rol::find($id);
            $rol->status = 'BJ';
            $rol->save();

            return response()->json([
                'Mensaje' => 'El rol '.$rol->name.' fue eliminado con exito',
                'status' => true
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'Mensaje' => 'Hubo un error al intentar eliminar el rol',
                'status' => false,
            ]);
        }
    }
}
