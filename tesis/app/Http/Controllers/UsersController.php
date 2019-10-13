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
            'tipo_usuario' =>$request->tipo_usuario,
            'sexo' =>$request->sexo
        ]);

        $email=$request->get('email');
        $profes=DB::table('users')->where('email',$email)->get();
        //para transformar consulta en array, que pueda ser recibido por la vista, y saber 
        //a que profesor corresponderá el grado academico a seleccionar
        foreach($profes as $profesor);
                //dd($profesor->id);
        if($request->tipo_usuario==2){
             return view('grado_academico_create',compact('profesor'));   
        }


        return view('adminhome');
    }
        
        public function create_grado_academico_profesor()
    {
       return view('users.create_grado_academico_profesor');
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
        $user->sexo=$request->get('sexo');
        $user->update();

         $email=$request->get('email');
        $profes=DB::table('users')->where('email',$email)->get();
        //para transformar consulta en array, que pueda ser recibido por la vista, y saber 
        //a que profesor corresponderá el grado academico a seleccionar
        foreach($profes as $profesor);
                //dd($profesor->id);
        if($request->tipo_usuario==2){
             return view('grado_academico_create',compact('profesor'));   
        }
        return view('welcome');
    }




    public function destroy($id)
    {
        //
        DB::table('users')->where('id', $id)->delete();
        return back()->with('status','El usuario ha sido eliminado con exito');
    }

    /**/

    public function save_profe_grado_academico(Request $request,$id)
    {
     //dd($request->get('grado_academico'));
     $profesor_grado_academico=DB::table('grado_academico_profesor_planta')->where('id',$id)->get();
     //dd($profesor_grado_academico);
     if(($profesor_grado_academico->isEmpty()==true)){
      DB::table('grado_academico_profesor_planta')->insert([
            'id' => $id,
            'estado' =>1,
            'grado_academico' => $request->grado_academico
        ]);
    }else{

    $profesor_grado_academico->grado_academico=$request->grado_academico;

        }

     return view('adminhome');
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
        $user=User::find($id);
        $user=User::findorfail($id);
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->tipo_usuario=2;
        $user->sexo=$request->get('sexo');
        $user->update();
        $grado_academico=Grado_academico::find($id);
        $grado_academico->grado_academico=$request->get('grado_academico');
        $grado_academico->update();
        return view('profesorhome');
    }

      public function store_grado_academico(Request $request)
    {
        //dd($request);
        $grado_academico=Grado_academico::find($id);
        $grado_academico->estado=1;
        $grado_academico->grado_academico=$request->get('grado_academico');
        $grado_academico->update();
        return view('adminhome');
    }


    public function definir_director_escuela()
    {
        $id=Auth::id();
        $user=User::find($id);
        $profes=DB::table('users')->where('tipo_usuario',2)->get();
        if($id==null or $user->tipo_usuario!=0){
            return view('tesis.sinpermiso');
        }else{
            if($user->tipo_usuario==0)
            {
                return view('users.definir_director_escuela',compact('profes'));
            }
        }
    }

    //NOTA:a veces  al realizar consulta el save o el update no funcionan, esto se debe en la mayoria de los casos
    //debido al no uso de find u findorfail, entonces lo mejor es almacenar el $id buscado en una variable y posteriormente usarle para no complicar generar ese error con save o update.
    public function guardar_director_escuela(Request $request)
    {
        $director_escuela_existe=DB::table('users')->where('director_escuela',1)->get();
        //dd($director_escuela_existe);
        if($director_escuela_existe->isEmpty()==true) //No existe director de escuela
        {
        $user=User::find($request->profesor);
        $user->director_escuela=1;
        $user->save();
        //dd($user);
        }else{
            if($director_escuela_existe->isEmpty()==false) //Ya existe director_escuela;
            {
             foreach($director_escuela_existe as $director_escuela)
             {
                //dd($director_escuela->director_escuela);
                $id=$director_escuela->id;
             }
             //dd($director_escuela);
            $director_escuela=User::find($id);
            $director_escuela->director_escuela=null;
            //dd($director_escuela->director_escuela);
            $director_escuela->save();
            $user=User::find($request->profesor);
             $user->director_escuela=1;
             //dd($user->director_escuela);
             $user->save();
            }
        }

        return view('adminhome');
    }


}
