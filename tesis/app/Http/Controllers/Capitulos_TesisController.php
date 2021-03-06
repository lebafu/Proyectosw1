<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class Capitulos_TesisController extends Controller
{
 

    public function create($id)
    {
        $idlogin=Auth::id();
        $users=DB::table('users')->where('id',$idlogin)->get();
        //dd($id);
        foreach($users as $user);
        $tesis=DB::table('capitulos')->where('id','=',$id)->get();
        foreach($tesis as $tes);
        if($user->tipo_usuario==2 and $tesis->isEmpty()==true){
      return view('capitulos.create',compact('id'));
  }else{
     return view('tesis.sinpermiso');
  }
    }

     public function store(Request $request)
    {
        $request->validate([
            'id_tesis' => 'required|integer',
            'cap1' => 'required|string',
            'cap2' => 'required|string',
        ]);

        /*DB::table('users')->insert([
            'name' => $request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'tipo_usuario' => $request->tipo_usuario,
            'rut' =>$request->rut,
        ]);*/

        $fecha=now();
       DB::table('capitulos')->insert([
            'id' => $request->id_tesis,
            'cap1' => $request->cap1,
            'cap2' => $request->cap2,
            'cap3' => $request->cap3,
            'cap4' => $request->cap4,
            'cap5' => $request->cap5,
            'cap6' => $request->cap6,
            'avance_cap1' => 0,
            'avance_cap2' => 0,
            'avance_cap3' => 0,
            'avance_cap4' => 0,
            'avance_cap5' => 0,
            'avance_cap6' => 0,
            'fecha' => $fecha,
        ]);
        //dd($request);

       	return view('profesorhome');
      }


    public function lista_capitulos_tesis($id)
    {
   //dd($id);
    $idlogin=Auth::id();
    $users=DB::table('users')->where('id',$idlogin)->get();
    foreach($users as $user);
    	$tesistas=DB::table('tesis')->where('id_pk',$id)->join('capitulos','tesis.id_pk','=','capitulos.id')->orderby('fecha','desc')->paginate(7);
    	//dd($tesistas->isEmpty());
    	//dd($id);
    	//dd($id);
    	$tes=DB::table('tesis')->where('id_pk',$id)->get();
    	foreach($tes as $t);
    	if($tesistas->isEmpty()==true and $t->acta_ex!=null)
    	{
    	 return view('capitulos.no_existen_capitulos');
    	}
    	return view('capitulos.lista_capitulos_tesis',compact('tesistas','id','user'));
    }

    public function edit_nombres($id)
        {
       	//dd($id);
      	$idlogin=Auth::id();
    	$users=DB::table('users')->where('id',$idlogin)->get();
    	//dd($id);
    	$capitulos=DB::table('capitulos')->where('id',$id)->get();
        $tesis=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesis as $tes)
        {
         $avance_general=$tes->avance_general;
        }
    	foreach($capitulos as $capitulo);
    	//dd($bitacora);
    	foreach($users as $user);
    	if($user->tipo_usuario==2)
    	{
    		return view('capitulos.edit_nombres',compact('capitulo','id','avance_general','tes'));
    	}else{
    		return view('tesis.sinpermiso');
    	}
    }

      public function edit_avances($id)
        {
        //dd($id);
        $idlogin=Auth::id();
        $users=DB::table('users')->where('id',$idlogin)->get();
        //dd($id);
        $capitulos=DB::table('capitulos')->where('id',$id)->get();
        $tesis=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesis as $tes)
        {
         $avance_general=$tes->avance_general;
        }
        foreach($capitulos as $capitulo);
        //dd($bitacora);
        foreach($users as $user);
        if($user->tipo_usuario==2)
        {
            return view('capitulos.edit_avances',compact('capitulo','id','avance_general','tes'));
        }else{
            return view('tesis.sinpermiso');
        }
    }
   				

        //Recibe los datos de tesis insertados por el alumno en un inicio.
    public function update_nombres(Request $request,$id)
    {
        //estado2==0 es que ha sido rechazado por director de tesis
        //dd($request);
        //dd($id_pk);
        //dd($request);
        //dd($request->cap5);
        DB::table('capitulos')->where('id',$id)->update(['cap1' =>  $request->cap1]);
        DB::table('capitulos')->where('id',$id)->update(['cap2' =>  $request->cap2]);
        DB::table('capitulos')->where('id',$id)->update(['cap3' =>  $request->cap3]);
        DB::table('capitulos')->where('id',$id)->update(['cap4' =>  $request->cap4]);
        DB::table('capitulos')->where('id',$id)->update(['cap5' =>  $request->cap5]);
        DB::table('capitulos')->where('id',$id)->update(['cap6' =>  $request->cap6]);
      /*  DB::table('capitulos')->where('id',$id)->update(['avance_cap1' =>  $request->avance_cap1]);
        DB::table('capitulos')->where('id',$id)->update(['avance_cap2' =>  $request->avance_cap2]);
        DB::table('capitulos')->where('id',$id)->update(['avance_cap3' =>  $request->avance_cap3]);
        DB::table('capitulos')->where('id',$id)->update(['avance_cap4' =>  $request->avance_cap4]);
        DB::table('capitulos')->where('id',$id)->update(['avance_cap5' =>  $request->avance_cap5]);
        DB::table('capitulos')->where('id',$id)->update(['avance_cap6' =>  $request->avance_cap6]);
        DB::table('capitulos')->where('id',$id)->update(['avance_cap6' =>  $request->avance_cap6]);
        DB::table('tesis')->where('id_pk',$id)->update(['avance_general' =>  $request->avance_general]);*/
       return view('profesorhome');
    }

     public function update_avances(Request $request,$id)
    {
        //estado2==0 es que ha sido rechazado por director de tesis
        //dd($request);
        //dd($id_pk);
        /*DB::table('capitulos')->where('id',$id)->update(['cap1' =>  $request->cap1]);
        DB::table('capitulos')->where('id',$id)->update(['cap2' =>  $request->cap2]);
        DB::table('capitulos')->where('id',$id)->update(['cap3' =>  $request->cap3]);
        DB::table('capitulos')->where('id',$id)->update(['cap4' =>  $request->cap4]);
        DB::table('capitulos')->where('id',$id)->update(['cap5' =>  $request->cap5]);
        DB::table('capitulos')->where('id',$id)->update(['cap6' =>  $request->cap6]);*/
        DB::table('capitulos')->where('id',$id)->update(['avance_cap1' =>  $request->avance_cap1]);
        DB::table('capitulos')->where('id',$id)->update(['avance_cap2' =>  $request->avance_cap2]);
        DB::table('capitulos')->where('id',$id)->update(['avance_cap3' =>  $request->avance_cap3]);
        DB::table('capitulos')->where('id',$id)->update(['avance_cap4' =>  $request->avance_cap4]);
        DB::table('capitulos')->where('id',$id)->update(['avance_cap5' =>  $request->avance_cap5]);
        DB::table('capitulos')->where('id',$id)->update(['avance_cap6' =>  $request->avance_cap6]);
        DB::table('capitulos')->where('id',$id)->update(['avance_cap6' =>  $request->avance_cap6]);
        DB::table('tesis')->where('id_pk',$id)->update(['avance_general' =>  $request->avance_general]);
       return view('profesorhome');
    }

}
