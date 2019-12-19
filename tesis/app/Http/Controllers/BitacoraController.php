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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Arr; //Para usar arreglos de laravel;
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
    //Conozco el usuario que ha iniciado sesion junto con su tipo de usuario.
    $users=DB::table('users')->where('id',$idlogin)->get();
    foreach($users as $user);
    //Se guarda en este arreglo los ids de las tesis que son distintas entre si.
    $ids_tesis=DB::table('bitacora')->select('id_tesis')->orderby('created_at','desc')->distinct()->get();
    //dd($ids_tesis);
    $i=0;
    $ids_tes=array();
    foreach($ids_tesis as $id_tesis){
    	 array_push($ids_tes,$id_tesis->id_tesis);
   		 $i=$i+1;
	}
	//print_r($ids_tes[0]);
	//El valor de i permite conocer cuantos ids de tesis diferentes existe en la tabla bitacoras.
	//dd($i);
      //dd($ids_tesis);
	//Si el tipo de usuario es coordinador de tesis podrá ver esta lista de bitacoras con el ultimo comentario referente a la tesis
    if($user->tipo_usuario==3){
    //Se hace un join o union entre la tabla bitacora y tesis donde la primary key de la tabla tesis sea igual al id_tesis en la tabla bitacora
    	//se ordena desde el acuerdo de tesis mas actual ingresado, al mas antiguo//
      $tesistas=DB::table('tesis')->join('bitacora','tesis.id_pk','=','bitacora.id_tesis')->orderby('created_at','desc')->get();
     //dd($tesistas);
      $j=0;
      $ids_bitacora=array();
  	  while($j<$i)
  	  {	

  	  	$bitacora=DB::table('tesis')->join('bitacora','tesis.id_pk','=','bitacora.id_tesis')->orderby('created_at','desc')->where('bitacora.id_tesis','=',$ids_tes[$j])->first();
  	  	//dd($bitacoras);
  	  		array_push($ids_bitacora,$bitacora->id);
  	  	
  	  	$j=$j+1;
  	  }
  	  //dd($ids_bitacora);
  	  $k=0;
  	  while($k<$i){
  	  	foreach($tesistas as $tesis){
  	  		if($ids_bitacora[$k]==$tesis->id){
  	  			 DB::table('bitacora')->where('id',$ids_bitacora[$k])->update(['actual' => 1]);

  	  }
  	  }
  	  $k=$k+1;
  	}
      //dd($j);
      //dd($tesistas);
      return view('bitacora.index_tesis_bitacora',compact('tesistas'));
     }
     return view('tesis.sinpermiso');
    }

    public function lista_acuerdos_tesis($id)
    {
   //dd($id);
    $idlogin=Auth::id();
    $users=DB::table('users')->where('id',$idlogin)->get();
    foreach($users as $user);
    	$tesistas=DB::table('tesis')->where('id_pk',$id)->join('bitacora','tesis.id_pk','=','bitacora.id_tesis')->orderby('created_at','desc')->paginate(7);
    	//dd($tesistas->isEmpty());
    	foreach($tesistas as $tesis){
    	$nombre1=$tesis->nombre_completo;
    	$nombre2=$tesis->nombre_completo2;
    	$profesor_guia=$tesis->profesor_guia;
    	//dd($id);
    	//dd($id);
    }
    	$tes=DB::table('tesis')->where('id_pk',$id)->get();
    	foreach($tes as $t);
    	if($tesistas->isEmpty()==true and $t->acta_ex!=null)
    	{
    	 return view('bitacora.no_existen_registros_bitacora');
    	}
    	return view('bitacora.lista_acuerdos_tesis',compact('tesistas','id','user'));
    }

    public function create($id)
    {
    	//dd($id);
    	$idlogin=Auth::id();
    	$users=DB::table('users')->where('id',$idlogin)->get();
    	//dd($id);
    	foreach($users as $user);
    	if($user->tipo_usuario==2)
    	{
    		return view('bitacora.create',compact('id'));
    	}else{
    		return view('tesis.sinpermiso');
    	}
    }


    public function store(Request $request)
    {
    	
    	//dd($request);
        $request->validate([
            'id_tesis' => 'required|integer',
            'comentario' => 'required|string',
            'acuerdo' => 'required|string',
            'reunion' => 'required|integer',
        ]);

        /*DB::table('users')->insert([
            'name' => $request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'tipo_usuario' => $request->tipo_usuario,
            'rut' =>$request->rut,
        ]);*/

       DB::table('bitacora')->insert([
            'id_tesis' => $request->id_tesis,
            'comentario' =>$request->comentario,
            'acuerdo' =>$request->acuerdo,
        ]);

       	DB::table('tesis')->where('id_pk','=',$request->id_tesis)->update(['reunion'=> $request->reunion]);

       $data=array();
       $ids_coordinadores=array();
       $coordinadors=DB::table('users')->where('tipo_usuario','=',3)->get();
       //dd($coordinadors);
       $i=0;
     		foreach($coordinadors as $coordinador)
     		{
     		  //dd($coordinador->id);       
     		  array_push($ids_coordinadores,$coordinador->id);
     		  $i=$i+1;
     		}
     	//dd($i);
     		//dd($ids_coordinadores);
       $tesistas=DB::table('tesis')->where('id_pk','=',$request->id_tesis)->get(); //Se obtienen datos de tabla tesis para la vista del email
       foreach($tesistas as $tesis);
       //dd($tesis->profesor_guia);
       $alumno1=DB::table('users')->where('name',$tesis->nombre_completo)->get();
       //dd($alumno1);
       foreach($alumno1 as $al1);
       if($tesis->nombre_completo2!=null)
       {
       	$alumno2=DB::table('users')->where('name',$tesis->nombre_completo2)->get();
       	foreach($alumno2 as $al2);
       }
     	//dd($request->reunion);
     	//dd($coordinador->email);
       if($request->reunion==3)
       {
       	$j=0;
       	   //dd($coordinador);
       	  if($tesis->nombre_completo2==null){
       	    $data=(['nombre_coordinador'=> $coordinador->name, 'nombre_completo' => $tesis->nombre_completo,'rut'=> $tesis->rut, 'email_alumno1'=> $al1->email,'profesor_guia' => $tesis->profesor_guia,'nombre_tesis' => $tesis->nombre_tesis, 'nombre_completo2'=>null, 'tipo_trabajo' => $tesis->tipo]);
       	   /* for($j=0;$j<$i;$j=$j+1){
       	    	$coordinador=DB::table('users')->where('id','=',$ids_coordinadores[$j])->first();
       	    	array_push($data,$coordinador->name);
       	    }*/
       	   }

       	  if($tesis->nombre_completo2!=null)
       	  {
       	  	//dd($tesis->profesor_guia);
       	  	 $data=(['nombre_coordinador'=> $coordinador->name, 'nombre_completo' => $tesis->nombre_completo,'rut'=> $tesis->rut, 'email_alumno1'=> $al1->email,'nombre_completo2'=> $tesis->nombre_completo2,'rut2'=> $tesis->rut2,'email_alumno2'=> $al2->email, 'profesor_guia' => $tesis->profesor_guia,'nombre_tesis' => $tesis->nombre_tesis, 'tipo_trabajo' => $tesis->tipo]);
       	  	 /*for($j=0;$j<$i;$j=$j+1){
       	    	$coordinador=DB::table('users')->where('id','=',$ids_coordinadores[$j])->first();
       	    	array_push($data,$coordinador);
       	    }*/

       	  }

       	  //$email_coordinador=$coordinador->email;
       	  //dd($data);
          Mail::send('bitacora.notificacion_coordinador',$data, function($message)
          {
          	$coordinadors=DB::table('users')->where('tipo_usuario','=',3)->get();
       //dd($coordinadors);
     		foreach($coordinadors as $coordinador){
          	$message->from('leonardo211294@gmail.com');
          	$message->to($coordinador->email)->subject('Estado de Alerta: No hay reunion');
          }
          });

       }
       	return view('profesorhome');
      }

      public function edit($id)
        {
       	//dd($id);
      	$idlogin=Auth::id();
    	$users=DB::table('users')->where('id',$idlogin)->get();
    	//dd($id);
    	$bitacoras=DB::table('bitacora')->where('id',$id)->get();
    	foreach($bitacoras as $bitacora);
    	//dd($bitacora);
    	foreach($users as $user);
    	if($user->tipo_usuario==2)
    	{
    		return view('bitacora.edit',compact('bitacora','id'));
    	}else{
    		return view('tesis.sinpermiso');
    	}
   				
        }

        //Recibe los datos de tesis insertados por el alumno en un inicio.
    public function update(Request $request,$id)
    {
        //estado2==0 es que ha sido rechazado por director de tesis
        //dd($request);
        //dd($id_pk);
        $tesis=DB::table('bitacora')->where('id',$id)->get();
        foreach($tesis as $tes);
        $tes->comentario=$request->get('comentario');
        DB::table('bitacora')->where('id',$id)->update(['comentario' =>  $tes->comentario]);
        $tes->acuerdo=$request->get('acuerdo');
        DB::table('bitacora')->where('id',$id)->update(['acuerdo' =>  $tes->acuerdo]);
       return view('profesorhome');
    }


       public function destroy($id)
    {
        //

        DB::table('bitacora')->where('id', $id)->delete();
        return back()->with('status','El comentario ha sido eliminada de la bitacora');
    }

    public function no_hay_acuerdo($id)
    {

    	//dd($id);
    	$idlogin=Auth::id();
    	$users=DB::table('users')->where('id',$idlogin)->get();
    	//dd($id);
    	foreach($users as $user);
    	if($user->tipo_usuario==2)
    	{
    		return view('bitacora.no_hay_acuerdo',compact('id'));
    	}else{
    		return view('tesis.sinpermiso');
    	}
    }

}
