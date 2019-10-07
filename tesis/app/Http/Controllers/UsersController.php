<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;
use App\User;
use App\Tesis;
use App\Grado_academico;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Closure;
use Session;
use Auth;
use DB;

class UsersController extends Controller
{
    //



    public function index()
    {
        
        $users=DB::table('users')->paginate(7);
        return view('users.index',compact('users'));

    }

     public function create()
    {
        //
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'tipo_usuario' => 'required|integer',
        ]);

        /*DB::table('users')->insert([
            'name' => $request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'tipo_usuario' => $request->tipo_usuario,
            'rut' =>$request->rut,
        ]);*/

       DB::table('users')->insert([
            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'tipo_usuario' =>$request->tipo_usuario
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
            $user=DB::table('users')->where('id', $id)->first();;
            return view('users.show',compact('user'));
        }
        public function edit($id)
        {
            //$user = DB::table('users')->where('id', $id)->first();
            //return view('users.edit',compact('user'));
        $user = DB::table('users')->where('id', $id)->first();
        return view('users.edit',compact('user'));
            //return $user; 
        }

   
    public function update(Request $request,$id)
    {
        $user=User::findorfail($id);
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=Hash::make($request->get('password'));
        $user->tipo_usuario=$request->get('tipo_usuario');
        $user->update();
        return view('welcome');
    }




    public function destroy($id)
    {
        //
        DB::table('users')->where('id', $id)->delete();
        return back()->with('status','El usuario ha sido eliminado con exito');
    }

    /**/

    public function save_profe_grado_academico(Request $request)
    {
     $id=Auth::id();
     $profesor_grado_academico=Grado_academico::find($id);
     $profesor_grado_academico->grado_academico=$request->grado_academico;
     $profesor_grado_academico->estado=1;
     $profesor_grado_academico->save();

     return view('profesorhome');
    }

    public function editar_informacion_profesor()
    {
        $id=Auth::id();
        $profesor_grado_academico=Grado_academico::find($id);
        $profesor=User::find($id);
        if($id==null or $profesor_grado_academico==null or $profesor==null)
        {
            return view('tesis.sinpermiso');
        }else{
            return view('users.editar_informacion_profesor',compact('profesor','profesor_grado_academico'));
        }
    }

    public function update_profesor(Request $request, $id)
    {
        //dd($request);
        /*$user=User::find($id);
        $user=User::findorfail($id);
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->tipo_usuario=2;
        $user->update();*/
        $grado_academico=Grado_academico::find($id);
        $grado_academico->grado_academico=$request->get('grado_academico');
        $grado_academico->update();
        return view('profesorhome');
    }
}
