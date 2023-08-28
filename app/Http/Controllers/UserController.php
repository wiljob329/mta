<?php

namespace App\Http\Controllers;

use App\Models\Registro_usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'cedula' => ['required', 'min:6', 'max:8'],
            'password' => ['required', 'min:5']
        ]);

        if(auth()->attempt([
            'cedula' => $incomingFields['cedula'], 
            'password' => $incomingFields['password'],
            'nivel' => 1]))
        {
            $request->session()->regenerate();
            return 'Felicitaciones!! haz entrado usuario de nivel 1';        

        }else if (auth()->attempt([
            'cedula' => $incomingFields['cedula'],
            'password' => $incomingFields['password'],
            'nivel' => 2]))
        {
            $request->session()->regenerate();
            return 'Felicitaciones!! haz entrado usuario de nivel 2';     

        }else if (auth()->attempt([
            'cedula' => $incomingFields['cedula'],
            'password' => $incomingFields['password'],
            'nivel' => 3]))
        {
            $request->session()->regenerate();
            return 'Felicitaciones!! haz entrado usuario de nivel 3';        

        }else
        {
            return 'No tiene acceso';
        }

    }

    public function registro(Request $request) {
        $incomingFields = $request->validate([
            'nombre' => ['required', 'min:6'],
            'cedula' => ['required', 'digits_between:6, 8', Rule::unique('registro_usuarios', 'cedula')],
            'correo' => ['required', 'email', Rule::unique('registro_usuarios', 'correo')],
            'password' => ['required', 'min:5'],
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
