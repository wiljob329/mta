<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function store(Request $request)
    {
        $solicitud = Solicitud::create([
            'estado' => 1,
            'registro_usuario_id' => auth()->user()->id
        ]);

        //return $solicitud;

        return redirect()->route('home')->with('success', 'Datos enviados con exito');
    }
}
