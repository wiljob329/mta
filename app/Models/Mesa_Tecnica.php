<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa_Tecnica extends Model
{
    use HasFactory;

    protected $table = 'mesa_tecnicas';

    protected $guarded = [];

    public function integrantes()
    {
        return $this->hasMany(Integrante::class);
    }
    public function documento()
    {
        return $this->hasOne(Documento::class);
    }
}
