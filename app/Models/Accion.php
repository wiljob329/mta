<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function mesa_tecnica()
    {
        return $this->belongsTo(Mesa_Tecnica::class, 'mesa_tecnica_id', 'id');
    }
    public function registro_usuario()
    {
        return $this->belongsTo(Registro_Usuario::class, 'registro_usuario_id', 'id');
    }
}
