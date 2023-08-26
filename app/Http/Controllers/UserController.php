<?php

namespace App\Http\Controllers;

use App\Models\Registro_usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function registro(Request $request) {
        $incomingFields = $request->validate([
            'nombre' => ['required', 'min:6'],
            'cedula' => ['required', 'min:6', 'max:8', Rule::unique('registro_usuarios', 'cedula')],
            'correo' => ['required', 'email', Rule::unique('registro_usuarios', 'correo')],
            'contraseña' => ['required', 'min:5'],
            'municipio' => ['required'],
            'parroquia' => ['required'],
            'consejo_comunal' => ['required', 'min:6'],
            'telefono' => ['required', 'digits_between:5, 11'],
            'direccion' => ['required']
        ]);
        Registro_usuario::create($incomingFields);
        return $incomingFields;
    }
}
