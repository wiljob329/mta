<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    use HasFactory;

    protected $table = 'integrantes';
    protected $guarded = [];

    public function mesa_tecnica()
    {
        return $this->belongsTo(Mesa_Tecnica::class);
    }
}
