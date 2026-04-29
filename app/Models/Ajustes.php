<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ajustes extends Model
{
    protected $fillable = [
        'nombre_empresa',
        'descripcion_empresa',
        'direccion_empresa',
        'telefono_empresa',
        'correo_empresa',
        'divisa_empresa',
        'logo_empresa',
        'web_empresa',
        'interes',
        'mora',
    ];
}
