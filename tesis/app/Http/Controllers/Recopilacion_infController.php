<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tesis;
use Carbon\Carbon;
use DB;
use Auth;
use Closure;
use Session;

class Recopilacion_infController extends Controller
{
    //
    public function create()
    {
    	$id=Auth::id();
    	$user=User::find($id);
    	if($id==null){
    		return view('tesis.sinpermiso');
    	}else{
    		if($user->tipo_usuario==1){//Si usuario es alumno entonces
    		$alumno=DB::table('tesis')->join('users','tesis.id','=','users.id')->where('tesis.id','=',$id)->get();
    		if($alumno->isEmpty()){ //Si la consulta anterior es vacia, entonces significa que el alumno que es el segundo alumno relacionado con la tesis, el que subio el archivo y desea completar el documento de recopilacion de inf.
    		$alumno=DB::table('tesis')->join('users','tesis.nombre_completo2','=','users.nombre_completo')->get();
    		}
    		$fecha_hoy=Carbon::parse(now());
    		//$dia_fecha=$fecha_hoy->day; //obtengo dia
        	//$mes_fecha=$fecha_hoy->month; //obtengo mes
        	//$year_actual=$fecha_hoy->year; //obtengo año
        	$fecha=$fecha_hoy->SubYear();
    	return view('recopilacion.recopilacion_informacion_titulados',compact('alumno','fecha'));

    		}
    	}
    	
    }


    public function store(Request $request)

    {
    	$id=Auth::id();
  		if($id==null){
            return view('tesis.sinpermiso');
        }
        $tesis=Tesis::find($id);
        //dd($request);
                if($tesis->nombre_completo2==null)
            {
       
            DB::table('recopilacion_inf_titulados')->insert([
                'id' => $request->id_pk,
                'fecha_nac' => $request->fecha_nac,
                'titulo' => $request->titulo,
                'telefono_celular' =>$request->celular,
                'telefono_fijo' =>$request->telefono,
                'facebook' => $request->facebook,
                'direccion_actual' => $request->direccion,
                'ano_egreso' => $request->ano_egreso,
               	'subido_constancia' => 1,

            ]);

        }

              if($tesis->nombre_completo2!=null)
            {

                DB::table('recopilacion_inf_titulados')->insert([
                'id' => $request->id_pk,
                'fecha_nac' => $request->fecha_nac,
                'titulo' => $request->titulo,
                'telefono_celular' =>$request->celular,
                'telefono_fijo' =>$request->telefono,
                'facebook' => $request->facebook,
                'direccion_actual' => $request->direccion,
                'ano_egreso' => $request->ano_egreso,
                'subido_constancia' => 1,
                'fecha_nac2' => $request->fecha_nac2,
                'titulo2' => $request->titulo2,
                'telefono_celular2' =>$request->celular2,
                'telefono_fijo2' =>$request->telefono2,
                'facebook2' => $request->facebook2,
                'direccion_actual2' => $request->direccion2,
                'ano_egreso2' => $request->ano_egreso2,
                ]);
            }


       return view('alumnohome');
    }


     public function edit($id)
        {
            //$user = DB::table('users')->where('id', $id)->first();
            //return view('users.edit',compact('user'));
                $idlogin=Auth::id();
                $user=User::findorfail($idlogin);
                //dd($user);
                $tesis = DB::table('tesis')->where('id_pk',$id)->get();
                $recopilaciones=DB::table('recopilacion_inf_titulados')->where('id',$id)->get();
                foreach($tesis as $tes);
                foreach($recopilaciones as $recopilacion);
                //dd($recopilacion);
            if(!Auth::id()){
                return view('tesis.sinpermiso');
            }elseif($user->tipo_usuario==1 and $tes->estado1==4 and $tes->estado2==1){
                return view('recopilacion.recopilacion_edit',compact('tes','recopilacion'));

            }
        }


	
    public function update(Request $request, $id)
    {
        $recopilaciones=DB::table('recopilacion_inf_titulados')->where('id',$id)->get();
        foreach($recopilaciones as $recopilacion);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['fecha_nac' =>  $request->fecha_nac]);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['titulo' =>  $request->titulo]);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['telefono_celular' =>  $request->telefono_celular]);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['telefono_fijo' =>  $request->telefono_fijo]);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['facebook' =>  $request->facebook]);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['direccion_actual' =>  $request->direccion_actual]);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['ano_egreso' =>  $request->ano_egreso]);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['fecha_nac2' =>  $request->fecha_nac2]);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['titulo2' =>  $request->titulo2]);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['telefono_celular2' =>  $request->telefono_celular2]);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['telefono_fijo2' =>  $request->telefono_fijo2]);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['facebook2' =>  $request->facebook2]);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['direccion_actual2' =>  $request->direccion_actual2]);
        DB::table('recopilacion_inf_titulados')->where('id',$id)->update(['ano_egreso2' =>  $request->ano_egreso2]);
      return view('alumnohome');

    }

}