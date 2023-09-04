<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    use HasFactory;

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function registro_usuarios()
    {
        return $this->hasMany(Registro_Usuario::class);
    }
}
