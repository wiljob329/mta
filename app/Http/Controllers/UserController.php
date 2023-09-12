<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

    public function createComunitaria() {
        Gate::authorize('comunitaria');
        return view('comunitaria');
    }

    public function homepage() {
        $solicitud = Solicitud::where('registro_usuario_id', auth()->user()->id)
                                ->first();

            return view('user-auth', compact('solicitud'));
        // return var_dump($solicitud);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.index');
    }

    public function create() {
        return view('homepage');
    }

    public function store(Request $request) {
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
            // return 'Felicitaciones!! haz entrado usuario de nivel 1';
            return redirect()->route('home')->with('success', 'logueado con exito');

        }else if (auth()->attempt([
            'cedula' => $incomingFields['cedula'],
            'password' => $incomingFields['password'],
            'nivel' => 2]))
        {
            $request->session()->regenerate();
            return redirect()->route('comunitaria')->with('success', 'Bienvenido a Comunitaria');

        }else if (auth()->attempt([
            'cedula' => $incomingFields['cedula'],
            'password' => $incomingFields['password'],
            'nivel' => 3]))
        {
            $request->session()->regenerate();
            return 'Felicitaciones!! haz entrado usuario de nivel 3';        

        }else
        {
            return redirect()->route('login.index')->with('error', 'Error, cedula o contraseña incorrectos');
        }

    }

  

}
