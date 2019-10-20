<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth; //Para usar funcion Auth::id()
use App\User;
use App\Memorandum;
class MemorandumController extends Controller
{
    //
    public function index()
    {
     $memos=DB::table('memorandum')->paginate(7);	
     //dd($memos);
     return view('memorandum.index',compact('memos'));
    }

    public function create()
    {
    $id=Auth::id();
    $user=User::find($id);
    if($user->tipo_usuario==3){
   	    return view('memorandum.create');
        }else{
            return view('tesis.sinpermiso');
        }
    }

    public function store(Request $request)
    {

    	$memo_existe=DB::table('memorandum')->where('nombre_memorandum','=',$request->nombre_memorandum)->get();
        //dd($request->texto1);
    		if($memo_existe->isEmpty()==true)
    		{
    		    DB::table('memorandum')->insert([
                'nombre_memorandum' => $request->nombre_memorandum,
                'escuela' => $request->escuela,
                'texto1' =>$request->texto1,
                'texto2' =>$request->texto2,
                'texto3' =>$request->texto3,
                'texto4' =>$request->texto4,
                'texto5' =>$request->texto5,
                'texto6' =>$request->texto6,
                'texto7' =>$request->texto7,

            		]);
                return view('directorhome');
    		}else{
    			return view('memorandum.ya_existe_memorandum');
    		}
    }

    public function ya_existe_memorandum()
    {
    	return view('memorandum.ya_existe');

    }

    public function edit($id)
    {
    	$memo=Memorandum::find($id);
    	return view('memorandum.edit',compact('memo'));

    }

    public function update(Request $request,$id)
    {

    $memo=Memorandum::find($id);
    $memo->nombre_memorandum=$request->get('nombre_memorandum');
    $memo->escuela=$request->get('escuela');
    $memo->texto1=$request->get('texto1');
    $memo->texto2=$request->get('texto2');
    $memo->texto3=$request->get('texto3');
    $memo->texto4=$request->get('texto4');
    $memo->texto5=$request->get('texto5');
    $memo->texto6=$request->get('texto6');
    $memo->texto7=$request->get('texto7');
    $memo->update();
	return view('directorhome');
    }
}
