<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Tesis;
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
         $id=$this->auth->user()->id;
        switch($tipo)
        {
            case 0:
            return view('adminhome');
            case 1:
            return view('alumnohome');
            case 2:
            return view('profesorhome');
            case 3:
            return view('directorhome');
            default: return view ('tesis.sinpermiso');
        }
        return view('home');
    }

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