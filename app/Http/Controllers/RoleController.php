<?php

namespace App\Http\Controllers;

use App\Models\Registro_Usuario;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function createAdmin() {
        Gate::authorize('admin');
        return view('admin');
    }

    public function createComunitaria() {
        Gate::authorize('comunitaria');
        $solicitudes = Solicitud::where('estado', 1)->get();
        return view('comunitaria', compact('solicitudes'));
    }
}
