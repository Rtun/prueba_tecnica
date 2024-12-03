<?php

namespace App\Http\Controllers;

use App\Models\RolxUsuario;
use Illuminate\Http\Request;

class RolxUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $rolxuser = RolxUsuario::all();

            return response()->json([
                'Mensaje' => 'Registros obtenidos',
                'Registros' => $rolxuser
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'Mensaje' => 'Hubo un problema al obtener los egistros'
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $r)
    {
        try {
            $context = $r->all();
            foreach($context['idrol'] as $rol){
                $m=new RolxUsuario();
                $m->idusuario = $context['idusuario'];
                $m->idrol = $rol;
                $m->save();
            }
            

            return response()->json([
                'Mensaje' => 'Se actualizaron los roles del usuario'
            ], 201);
        } catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                'Mensaje' => 'Hubo un error al agregar roles a el usuario',
                'status' => false
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
        try {
            $context = $r->all();
            RolxUsuario::where('idusuario',$context['idusuario'])->delete();
            foreach($context['idrol'] as $rol){
                $m = new RolxUsuario();
                $m->idusuario = $context['idusuario'];
                $m->idrol = $rol;
                $m->save();
            }
            

            return response()->json([
                'Mensaje' => 'Se actualizaron los roles del usuario'
            ], 201);
        } catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                'Mensaje' => 'Hubo un error al actualizar roles a el usuario',
                'status' => false
                ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $r)
    {
        try {
            $context = $r->all();
            $roles = RolxUsuario::where('idrol',$context['idrol'])->where('idusuario', $context['idusuario'])->delete();

            return response()->json([
                'Mensaje' => 'los roles se han eliminado del usuario'
            ], 200);

        } catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                'Mensaje' => 'Hubo un error al momento de eliminar los roles del usaurio'
            ], 400);
        }
    }
}
