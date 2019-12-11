<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    //
    protected $table = 'comision';
    protected $primarykey = 'id';
    public $timestamps = true;
    protected $fillable = [
    'id_tesis',
    'comentario',
    'acuerdo',
}
