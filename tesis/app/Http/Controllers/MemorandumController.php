<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MemorandumController extends Controller
{
    //
    public function index()
    {
     $memo=Memorandum::get();	
    }

    public function create()
    {
    $id=Auth::id();
   	return view('memorandum.create');

    }

    public function store(Request $request)
    {

    	$memo_existe=DB::table('memorandum')->where('nombre_memorandum','=',$nombre_memorandum)->get();

    		    DB::table('recopilacion_inf_titulados')->insert([
                'nombre_memorandum' => $request->nombre_memorandum,
                'escuela' => $request->escuela,
                'texto1' =>$request->texto1,
                'texto2' =>$request->texto2,
                'texto3' =>$request->texto3,

            ]);


    }
}
