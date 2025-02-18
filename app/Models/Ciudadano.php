<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudadano extends Model
{
    use HasFactory;

    protected $connection = 'oracle';
    protected $table = 'CIUDADANO';

    protected $fillable = [
        'id',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'sexo',
        'rif',
        'fecha_nacimiento',
        'estado_civil',
        'telefono',
        'email',
        'fecha_fallecimiento',
    ];
}
