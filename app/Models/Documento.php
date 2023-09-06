<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $table = 'documentos';
    protected $guarded = [];

    public function mesa_tecnica()
    {
        return $this->belongsTo(Mesa_Tecnica::class);
    }
}
