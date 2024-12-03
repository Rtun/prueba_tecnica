<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function store( ) {
        if (auth()->attempt(request(['email', 'password'])) == false){
            return redirect()->back()->withErrors([
                'message' => 'La contraseña o el correo son incorrectos, porfavor verica los datos :)'
            ]);

        }
        return redirect()->to('/');
    }

    public function show_users() {
        $usuario = User::all();

        $informacion = [
            'usuario' => $usuario
        ];
        return view('usuarios')->with($informacion);
    }

    public function show_roles() {
        $rol = Rol::all();

        $informacion = [
            'rol' => $rol
        ];

        return view('roles')->with($informacion);
    }

    public function show_modulos() {
        $modulo = Modulo::all();

        $informacion = [
            'modulo' => $modulo
        ];

        return view('modulos')->with($informacion);
    }

    public function destroy() {
        auth()->logout();
        return redirect()->to('/login');
    }
}
