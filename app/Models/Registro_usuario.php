<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Database\Eloquent\Model;

class Registro_Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "registro_usuarios";
    protected $fillable = [
        'cedula',
        'nombre',
        'correo',
        'password',
        'telefono',
        'direccion',
        'consejo_comunal',
        'parroquia_id'
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }
    
    public function solicitud()
    {
        return $this->hasOne(Solicitud::class);
    }
}
