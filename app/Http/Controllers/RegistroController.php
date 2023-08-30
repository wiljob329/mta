<?php

namespace App\Http\Controllers;

use App\Models\Registro_usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegistroController extends Controller
{

    public function create() {
        return view('register');
    }
    
    public function store(Request $request) {
        $request->validate([
            'nombre' => ['required', 'min:6'],
            'cedula' => ['required', 'digits_between:6, 8', Rule::unique('registro_usuarios', 'cedula')],
            'correo' => ['required', 'email', Rule::unique('registro_usuarios', 'correo')],
            'password' => ['required', 'min:5'],
            'consejo_comunal' => ['required', 'min:6'],
            'telefono' => ['required', 'digits_between:5, 11'],
            'direccion' => ['required']
        ]);

        $user = Registro_usuario::create([
            'nombre' => $request->nombre,
            'cedula' => $request->cedula,
            'correo' => $request->correo,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'consejo_comunal' => $request->consejo_comunal,

        ]);
        event(new Registered($user));

        Auth::login($user);
        return redirect()->route('login.index');
        // Registro_usuario::create($incomingFields);
        // return $incomingFields;
    }
}
