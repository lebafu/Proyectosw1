<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memorandum extends Model
{
    //
     protected $table = 'memorandum';
    protected $primarykey = 'id';
    protected $fillable =['nombre_memorandum','escuela','texto1','texto2','texto3'];
    public $timestamps = false;
}
