<?php

namespace App\Http\Controllers;

use App\Models\Registro_usuario;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registro(Request $request) {
        $incomingFields = $request->validate([
            'nombre' => 'required',
            'cedula' => 'required',
            'correo' => 'required',
            'contraseña' => 'required',
            'municipio' => 'required',
            'parroquia' => 'required',
            'consejo_comunal' => 'required',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);
        Registro_usuario::create($incomingFields);
        return 'HOLA';
    }

    public function login(Request $request) {
        $incoming = $request->validate([
            'cedula' => 'required',
            'contraseña' => 'required'
        ]);

        if (auth()->attempt(['cedula' => $incoming['cedula'], 'contraseña' => $incoming['contraseña']])) {
            return "congratss!!!";
        }else {
            return "error!!!!"; 
        }
    }
}
