<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class UserController extends Controller
{

    public function homepage() {
        return view('user-auth');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.index')->with('success', 'Saliste con exito!');
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
            return redirect()->route('login.index')->with('error', 'Error, cedula o contraseña incorrectos');
        }

    }

  

}
