<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $usuario = User::where('status', 'AC')->get();

            return response()->json([
                'Mensaje' => 'Esta es la lista de usuarios: ',
                'Usuarios' => $usuario
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
            $usuario = new User();
            $usuario->name = $context['name'];
            $usuario->email = $context['email'];
            $usuario->password = $context['password'];
            $usuario->telefono = $context['telefono'];
            $usuario->save();

            return response()->json([
                'Mensaje' => 'Ususario creado correctamente',
                'status' => true,
            ], 201);
         } catch (\Throwable $e) {
            // throw $e;
            return response()->json([
                'Mensaje' => 'Hubo un error al intentar guardar el usuario',
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
            $usuario = User::find($id);
            $usuario->name = $context['name'];
            $usuario->email = $context['email'];
            $usuario->password = $context['password'];
            $usuario->telefono = $context['telefono'];
            $usuario->save();

            return response()->json([
                'Mensaje' => 'El usuario '.$usuario->name.' Se actualizo correctamente',
                'status' => true
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'Mensaje' => 'Hubo un error al intentar actualizar el usuario',
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
            $usuario = User::find($id);
            $usuario->status = 'BJ';
            $usuario->save();

            return response()->json([
                'Mensaje' => 'El usuario '.$usuario->name.' fue eliminado con exito',
                'status' => true
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'Mensaje' => 'Hubo un error al intentar eliminar el usuario',
                'status' => false,
            ]);
        }
    }
}
