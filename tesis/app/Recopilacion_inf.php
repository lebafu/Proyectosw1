<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recopilacion_inf extends Model
{
    //
    protected $table = 'recopilacion_inf_titulados';
    protected $primarykey = 'id';
    protected $fillable =['fecha_nac','titulo','telefono_celular','telefono_fijo','facebook','direccion_actual','ano_egreso','subido_constancia','fecha_nac2','titulo2','telefono_celular2','telefono_fijo2','facebook2','direccion_actual2','ano_egreso2'];
    public $timestamps = false;
}
