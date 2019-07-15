<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
    protected $table = 'comision';
    protected $primarykey = 'id';
    public $timestamps = false;
    //
    protected $fillable = [
    'id_profesor_guia',
    'nombre_alumno',
    'profesor1_comision',
    'profesor2_comision',
    'profesor3_comision',
    'profesor1_externo',
    'correo_profe1_externo',
    'institucion1',
    'profesor2_externo',
   	'correo_profe2_externo',
    ];
}
