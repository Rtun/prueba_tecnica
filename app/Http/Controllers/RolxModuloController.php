<?php

namespace App\Http\Controllers;

use App\Models\RolxModulo;
use Illuminate\Http\Request;

class RolxModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $rolxmod = RolxModulo::all();

            return response()->json([
                'Mensaje' => 'Registros obtenidos',
                'Registros' => $rolxmod
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
            foreach($context['idmodulo'] as $mod){
                $m=new RolxModulo();
                $m->idrol = $context['idrol'];
                $m->idmodulo = $mod;
                $m->save();
            }
            

            return response()->json([
                'Mensaje' => 'Se actualizaron los modulos del rol'
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
            RolxModulo::where('idrol',$context['idrol'])->delete();
            foreach($context['idmosulo'] as $mod){
                $m = new RolxModulo();
                $m->idrol = $context['idrol'];
                $m->idmodulo = $mod;
                $m->save();
            }
            

            return response()->json([
                'Mensaje' => 'Se actualizaron los modulos del rol'
            ], 201);
        } catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                'Mensaje' => 'Hubo un error al actualizar modulos del rol',
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
            $modulos = RolxModulo::where('idmodulo',$context['idmodulo'])->where('idrol', $context['idrol'])->delete();

            return response()->json([
                'Mensaje' => 'los modulos se han eliminado del rol'
            ], 200);

        } catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                'Mensaje' => 'Hubo un error al momento de eliminar los modulos del rol'
            ], 400);
        }
    }
}
