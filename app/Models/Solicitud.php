<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $table = 'solicitudes';
    protected $guarded = [];

    public function registro_usuario()
    {
        return $this->belongsTo(Registro_Usuario::class, 'id', 'registro_usuario_id');
    }
}
