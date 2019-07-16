<?php

namespace App\Http\Controllers;
use App\User;
use App\Tesis;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use DB;

class TesisController extends Controller
{
    
	public function index()
    {
        
        $tesistas=DB::table('tesis')->paginate(7);
        return view('tesis.index',compact('tesistas'));

    }

     public function create()
    {
        //
        return view('tesis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string',
            'rut' => 'required|string|unique:tesis',
            'ano_ingreso' => 'required|integer|min:4|max:4',
            'profesor_guia' => 'required|string',
            'nombre_tesis' => 'required|string',
            'area_tesis' => 'required|string',
            'carrera' => 'required|string',
            'tipo_vinculacion' => 'required|string',
            'nombre_vinculacion' => 'required|string',
            'tipo' => 'required|string',
            'descripcion' => 'required|string',
            'objetivos' =>'required|string',
            'contribucion' => 'required|string'
        ]);

        /*DB::table('users')->insert([
            'name' => $request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'tipo_usuario' => $request->tipo_usuario,
            'rut' =>$request->rut,
        ]);*/

       DB::table('users')->insert([
            'nombre_completo' => $request->nombre_completo,
            'rut' =>$request->rut,
            'ano_ingreso' => Hash::make($request->ano_ingreso),
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
            $tesis=DB::table('tesis')->where('id', $id)->first();;
            return view('tesis.show',compact('tesis'));
        }


        public function edit($id)
        {
            //$user = DB::table('users')->where('id', $id)->first();
            //return view('users.edit',compact('user'));
        $tes = DB::table('tesis')->where('id', $id)->first();
        //$tes->estado1=2;
        return view('tesis.edit',compact('tes'));
            //return $user; 
        }

   
    public function update(Request $request,$id)
    {
        $tes=Tesis::findorfail($id);
        $tes->nombre_completo=$request->get('nombre_completo');
        $tes->rut=$request->get('rut');
        $tes->ano_ingreso=$request->get('ano_ingreso');
        $tes->profesor_guia=$request->get('profesor_guia');
        $tes->nombre_tesis=$request->get('nombre_tesis');
        $tes->area_tesis=$request->get('area_tesis');
        $tes->carrera=$request->get('carrera');
        $tes->tipo_vinculacion=$request->get('tipo_vinculacion');
        $tes->nombre_vinculacion=$request->get('nombre_vinculacion');
        $tes->tipo=$request->get('tipo');
        $tes->descripcion=$request->get('descripcion');
        $tes->objetivos=$request->get('objetivos');
        $tes->contribucion=$request->get('contribucion');
        $tes->update();
        return view('welcome');
    }




    public function destroy($id)
    {
        //
        DB::table('tesis')->where('id', $id)->delete();
        return back()->with('status','La tesis ha sido eliminada con exito');
    }
}
