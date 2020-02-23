<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use App\User;
//use DB;
use Closure;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $auth;
    
    public function __construct(Guard $auth)
    {
        //le diremos que gestione el acceso por usuario 
        $this->middleware('auth');
        $this->auth =$auth;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $users=DB::table('users')->paginate(7);
        $tipo = $this->auth->user()->tipo_usuario;
        $var_director_escuela = $this->auth->user()->director_escuela;
        $id=$this->auth->user()->id;

        $profesor_existe_en_grad_academico=DB::table('grado_academico_profesor_planta')->where('id',$id)->get();
        if($tipo==2 and $profesor_existe_en_grad_academico->isEmpty()==true)
        {

         DB::table('grado_academico_profesor_planta')->insert([
            'id' => $id,
            'estado' => null,
            'grado_academico'=>null
        ]);
        }

        //Con este switch case dependiendo del tipo de usuario que se loguee  e inicie sesion se redirijira a su respectivo home.
        $profesor_tiene_grad_academico_asignado=DB::table('grado_academico_profesor_planta')->where('id',$id)->where('estado',1)->get();
        switch($tipo)
        {
            case 0:
            return view('adminhome');
            case 1:
            return view('alumnohome');
            case 2:
            if($tipo==2 and $profesor_tiene_grad_academico_asignado->isEmpty()==true)
            {
                //dd($profesor_tiene_grad_academico_asignado->isEmpty());
                return view('grado_academico_create',compact('id'));
            }else{
                if($tipo==2 and $var_director_escuela==0){
               return view('profesorhome');
               }else{
                if($tipo==2 and $var_director_escuela==1){
                    return view('director_escuelahome');
               } 
            }
        }
            case 3:
            return view('directorhome');
            case 4: 
            return view('secretariahome');
            default: return view ('tesis.sinpermiso');
        }
        return view('home');
    }

    /*public function grado_academico_create 
    {
        return view('grado_academico_create')
    }*/
    
    /*public function admin(){
        $id=$this->auth->user()->id;
        $users=DB::table('users')->paginate(7);
        $tipo = $this->auth->user()->tipo_usuario;
        if($tipo==0){
            return view('adminhome');
        }
    }
     public function alumno(){
        $id=$this->auth->user()->id;
        $users=DB::table('users')->paginate(7);
        $tipo = $this->auth->user()->tipo_usuario;
        if($tipo==1){
            return view('alumnohome');
        }
    }
    public function profesor(){
        $id=$this->auth->user()->id;
        $users=DB::table('users')->paginate(7);
        $tipo = $this->auth->user()->tipo_usuario;
        if($tipo==2){
            return view('profesorhome');
        }
    }
    public function director(){
        $id=$this->auth->user()->id;
        $users=DB::table('users')->paginate(7);
        $tipo = $this->auth->user()->tipo_usuario;
        if($tipo==3){
            return view('directorhome');
        }
    }*/
}