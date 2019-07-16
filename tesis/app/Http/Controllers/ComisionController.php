<?php

namespace App\Http\Controllers;

use App\User;
use App\Tesis;
use App\Comision;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use DB;
class ComisionController extends Controller
{
    //

    public function index()
    {
        
        $comision=DB::table('comision')->join('tesis','comision.id','=','tesis.id')->select('comision.id','tesis.profesor_guia','comision.nombre_alumno','comision.profesor1_comision','comision.profesor2_comision,comision.profesor3_comision','comision.profesor1_externo','comision.correo_profe1_externo','comision.institucion1','comision.profesor2_externo','comision.correo_profe2_externo','comision.institucion2')->get();
        return view('comision.index',compact('comision'));

    }

     public function create()
    {
        //
        return view('comision.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_profesor_guia' => 'required|integer',
            'nombre_alumno' => 'required|string',
            'profesor1_comision' => 'required|string',
            'profesor2_comision' => 'required|string',
            'profesor3_comision' =>'required|string',
            'profesor1_externo'=> 'required|string',
            'correo_profe1_externo' => 'required|string',
            'institucion1' => 'required|string',
            'profesor2_externo' => 'required|string',
            'correo_profe2_externo' => 'required|string',
            'institucion2' => 'required|string',
        ]);

        /*DB::table('users')->insert([
            'name' => $request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'tipo_usuario' => $request->tipo_usuario,
            'rut' =>$request->rut,
        ]);*/

       DB::table('comision')->insert([
            'id_profesor_guia' => $request->id_profesor_guia,
            'nombre_alumno' =>$request->nombre_alumno,
            'profesor1_comision' => $request->profesor1_comision,
            'profesor_guia' =>$request->profesor_guia,
            'nombre_tesis' => $request->nombre_tesis,
            'area_tesis' => $request->area_tesis,
            'carrera' => $request->carrera,
            'tipo_vinculacion' => $request->tipo_vinculacion,
            'nombre_vinculacion' =>$request->nombre_vinculacion,
            'tipo'=> $request->tipo,
            'descripcion' =>$request->descripcion,
            'objetivos' => $request->objetivos,
            'contribucion'=> $request->contribucion,

        ]);
        
        /*if($request->get('tipo_usuario')=='Alumno'){
            $info_alumno = new Info_alumno;
            $info_alumno->id= $usuario->id;
            $info_alumno->ano_ingreso=0;
            $info_alumno->carrera="";
            $info_alumno->telefono="";
            $info_alumno->condicion=0;
            $info_alumno->save();

            // ahora se ingresa su id en la tabla tesis_alumnos

            $tesis_alumno = new Tesis_alumno;

            $tesis_alumno->id = $usuario->id;
            
            $tesis_alumno->nombre_tesis="";
            $tesis_alumno->descripcion="";
            $tesis_alumno->objetivos="";
            $tesis_alumno->contribucion_e="";
            $tesis_alumno->area_tesis="";
            $tesis_alumno->save();
            
        }

        if($request->get('tipo_usuario')=='Prof_ext'){
            $prof_ext = new Info_proExt;
            $prof_ext->id=$usuario->id;
            $prof_ext->correo_profesor=$usuario->email;
            $prof_ext->institucion="";
            $prof_ext->condicion=0;
            $prof_ext->save();
            

        }*/

        return view('welcome');
    }
        

        public function show($id)
        {
            $comision=DB::table('comision')->where('id', $id)->first()->join('tesis','comision.id','=','tesis.id')->select('comision.id','tesis.profesor_guia','comision.nombre_alumno','comision.profesor1_comision','comision.profesor2_comision,comision.profesor3_comision','comision.profesor1_externo','comision.correo_profe1_externo','comision.institucion1','comision.profesor2_externo','comision.correo_profe2_externo','comision.institucion2')->get();
            return view('comision.show',compact('comision'));
        }


        public function edit($id)
        {
            //$user = DB::table('users')->where('id', $id)->first();
            //return view('users.edit',compact('user'));
        $com = DB::table('comision')->where('id', $id)->first();
        //$tes->estado1=2;
        return view('comision.edit',compact('com'));
            //return $user; 
        }

   
    public function update(Request $request,$id)
    {
        $com=Comision::findorfail($id);
        $com->id_profesor_guia=$request->get('id_profesor_guia');
        $com->nombre_alumno=$request->get('nombre_alumno');
        $com->profesor1_comision=$request->get('profesor1_comision');
        $com->profesor2_comision=$request->get('profesor2_comision');
        $com->profesor3_comision=$request->get('profesor3_comision');
        $com->profesor1_externo=$request->get('profesor1_externo');
        $com->correo_profe1_externo=$request->get('correo_profe1_externo');
        $com->institucion1=$request->get('institucion1');
        $com->profesor2_externo=$request->get('profesor2_externo');
        $com->correo_profe2_externo=$request->get('correo_profe2_externo');
        $com->institucion2=$request->get('institucion2');
        $com->update();
        return view('welcome');
    }




    public function destroy($id)
    {
        //
        DB::table('comision')->where('id', $id)->delete();
        return back()->with('status','La comision ha sido eliminada con exito');
    }
}
