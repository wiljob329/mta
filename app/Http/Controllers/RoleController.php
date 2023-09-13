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
        $user = new Registro_Usuario;
        $solicitudes = Solicitud::all();
        // $solicitudes = Solicitud::whereBelongsTo($user, 'registro_usuario_id');
        return view('comunitaria', compact('solicitudes'));
    }
}
