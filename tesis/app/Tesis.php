<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tesis extends Model
{
    //

    protected $table = 'tesis';
    protected $primarykey = 'id';
    public $timestamps = false;
    //
    protected $fillable = [
    'nombre_completo',
    'rut',
    'profesor_guia',
    'ano_ingreso',
    'carrera',
    'tipo',
    'nombre_vinculacion',
    'tipo_vinculacion',
    'nombre_tesis',
    'area_tesis',
    'descripcion',
    'objetivos',
    'contribucion',
    'observacion',
    'estado1', //para decir si esta con el alumno, profesor o director de tesis
    'estado2', //Para decir si esta aprobado o desaprobado segun el director de tesis.
    'estado3',
    'fecha_peticion',
    'nota_pendiente',
    'nota_prorroga'
    ];

    //Estado1 para que solo el alumno pueda editar, esto cuando aun el profesor no edita ni evalua ni ve, el formulario, si edita o evalua o mira, el formulario pasa el estado1 a 2, luego una vez que lo envia al director de tesis, estado1 sigue  2, pero para cuando el director vea, edite o apruebe el formulario, estado1 pasará a 3, y estado2 tendrá el valor de 1. En caso de que el formulario sea rechazado en primera instancia por el profesor guia, esto provocará que estado1 se mantenga en 1, y el alumno podrá editarle y hacerle los ajustes correspondientes.En caso de que el formulario sea rechazado por el director de tesis, estado1 estará con valor=2, y estado2 con valor 0, lo que implicará que tanto el profesor como el alumno podrán modificar el formulario.
}
