<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    public function registro_usuario()
    {
        return $this->belongsTo(Registro_Usuario::class);
    }
}
