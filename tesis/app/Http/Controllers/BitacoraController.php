<?php

namespace App\Http\Controllers;

use App\User;
use App\Tesis;
use App\Comision;
use App\Recopilacion_inf;
use App\Memorandum;
use App\Grado_academico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Contracts\Auth\Guard;
use iio\libmergepdf\Merger;
use iio\libmergepdf\Pages;
use ZipArchive;
use PDFMerger;
use DB;
use Auth;
use Closure;
use Session;
class BitacoraController extends Controller
{
    //
    public function index()
    {
    $idlogin=Auth::id();
    $users=DB::table('users')->where('id',$idlogin)->get();
    foreach($users as $user);
    //dd($users);
    if($user->tipo_usuario==2){
      //$tesistas=DB::table('bitacora')->join('tesis','bitacora.id_tesis','=','tesis.id_pk')->where('tesis.profesor_guia','=',$user->name)->paginate(7);
      $tesistas=DB::table('tesis')->where('profesor_guia','=',$user->name)->paginate(7);
      //dd($tesistas);
      return view('bitacora.index_tesis_bitacora',compact('tesistas'));
     }
     return view('tesis.sinpermiso');
    }

    public function lista_acuerdos_tesis($id)
    {
    $idlogin=Auth::id();
    $users=DB::table('users')->where('id',$idlogin)->get();
    foreach($users as $user);
    	$tesistas=DB::table('bitacora')->where('id_tesis',$id)->join('tesis','bitacora.id_tesis','=','tesis.id_pk')->where('tesis.profesor_guia','=',$user->name)->paginate(7);
    	return view('bitacora.lista_acuerdos_tesis',compact('tesistas'));
    }

    public function create()
    {
    	$idlogin=Auth::user();
    	$users=DB::table('users')->where('id',$idlogin)->get();
    	foreach($users as $user);
    	if($user->tipo_usuario==2)
    	{
    		return view('bitacora.index_tesis_bitacora');
    	}else{
    		return view('tesis.sinpermiso');
    	}
    }


    public function store()
    {

    }
}
