<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Tesis;
use App\Comision;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id=$this->auth->user()->id;

        $users=DB::table('users')->paginate(7);
        $tipo = $this->auth->user()->tipo_usuario;

        switch ($tipo) {
            case 0://administrador
                return view('users.index',compact('users'));
                break;

            case 1://alumno
                $tesis_alumno = Tesis::findOrFail($id);

                if($info_alumno->condicion==1){
                    return view('informacion_alumno.edit',["info_alumno"=>$info_alumno,"tesis_alumno"=>$tesis_alumno]);
                }
                break;

            case 1: //profesor
                $pro_ext=Info_proExt::findOrFail($id);

                if($pro_ext->condicion==0){
                    return view('profesor_externo.edit',["pro_ext"=>$pro_ext]);
                                 
                }else{
                    return view('profesor_externo.index');
                }
                break;

            case 2://director_tesis
                $data=[
                    'tesis' => DB::table('tesis_alumnos')->select(['nombre_tesis','id'])->get(),
                    'profes_guias' => DB::table('users')->where('tipo_usuario','=','Profesor')->get(),
                    'profes_comision' => DB::table('users')->where('tipo_usuario','=','Profesor')->orwhere('tipo_usuario','=','Prof_ext')->get()
                ];                
                
                return view('comision_tesis.create',$data);
                break;

            case 'Secretaria':   
                $tesis=DB::table('tesis_alumnos')->join('users','tesis_alumnos.id','=','users.id')->select('name','tesis_alumnos.nombre_tesis','tesis_alumnos.area_tesis')->get();
                    return view('users.secretariaindex',compact('tesis'));
                    break;
            
            default:
                echo "Tipo usuario no válido";
                break;
        }
    }
}
