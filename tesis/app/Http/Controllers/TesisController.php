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
use Illuminate\Support\Str;
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


//Las vistas con nombre print e imprimir son vistas para generar informes, desde ahi se hacen las consultas para pasar los datos //
//a la vista(informes_generar_pdf), que contiene una tabla con las tesis generadas en el intervalo de tiempo de la consulta realizada por el director de tesis, y se genera un boton para cada una de estas opciones, donde al hacer click se abrira una pestaña que contendra el pdf que deseó generar con los resultados de la consulta.//
class TesisController extends Controller
{

    public function repositorio_tesis(Request $request)
    {
        //Para usar la funcion now(), se modifico en app/config/app.php 'timezone' => 'UTC' a 'America/Santiago', para que tome la hora del pais. 
        //dd($request);
        //$palabra=$request->get('palabra');
        //dd($request);
        $nombre_completo=$request->get('nombre_completo');
        $nombre_tesis=$request->get('nombre_tesis');
        $abstract=$request->get('abstract');
         $tesis=DB::table('tesis')->where('fecha_presentacion_tesis','<',now())->where('nota_tesis','>=',4)->paginate(7);
        //dd($tesis);
        if($nombre_completo==null and $nombre_tesis==null and $abstract==null)
        {
            $tesis=DB::table('tesis')->where('fecha_presentacion_tesis','<',now())->where('nota_tesis','>=',4)->paginate(7);
            //dd($tesis);
            foreach($tesis as $tes)
            {
                $var_titulo=$tes->nombre_tesis;
                $tes->titulo=Str::limit($var_titulo,100);
                $var=$tes->abstract;
                $tes->abstract_res=Str::limit($var,309); //variable para cortar string y mostrarlo en la vista
            }
             return view('tesis.repositorio_tesis',compact('tesis'));
        }else{
            if($nombre_completo==null and $nombre_tesis!=null and $abstract!=null)
            {
                foreach($tesis as $tes)
            {
                $var_titulo=$tes->nombre_tesis;
                $tes->titulo=Str::limit($var_titulo,100);
                $var=$tes->abstract;
                $tes->abstract_res=Str::limit($var,309);
            }
               $tesis=DB::table('tesis')->where('fecha_presentacion_tesis','<',now())->where('nota_tesis','>=',4)
                ->where('nombre_tesis','like',"%$nombre_tesis%")
                ->where('abstract','like',"%$abstract%")->paginate(7);
             return view('tesis.repositorio_tesis',compact('tesis'));
            }else{
                    if($nombre_completo==null and $nombre_tesis==null and $abstract!=null)
                    {
                         $tesis=DB::table('tesis')->where('fecha_presentacion_tesis','<',now())
                         ->where('abstract','like',"%$abstract%")
                         ->paginate(7);
                        
                        foreach($tesis as $tes)
                        {
                             $var_titulo=$tes->nombre_tesis;
                             $tes->titulo=Str::limit($var_titulo,100);
                             $var=$tes->abstract;
                             $tes->abstract_res=Str::limit($var,309);
                        }
                         return view('tesis.repositorio_tesis',compact('tesis'));
                    }else{
                            if($nombre_completo==null and $nombre_tesis!=null and $abstract!=null)
                            {
                                 $tesis=DB::table('tesis')->where('fecha_presentacion_tesis','<',now())
                                  ->where('nombre_tesis','like',"%$nombre_tesis%")->where('nota_tesis','>=',4)
                                 ->where('abstract','like',"%$abstract%")
                                 ->paginate(7);
                                foreach($tesis as $tes)
                                {
                                    $var_titulo=$tes->nombre_tesis;
                                    $tes->titulo=Str::limit($var_titulo,100);
                                    $var=$tes->abstract;
                                    $tes->abstract_res=Str::limit($var,309);
                                }
                                 return view('tesis.repositorio_tesis',compact('tesis'));
                            }else{
                                if($nombre_completo!=null and $nombre_tesis==null and $abstract==null)
                                {
                                     $tesis=DB::table('tesis')->where('fecha_presentacion_tesis','<',now())
                                     ->where('nombre_completo','like',"%$nombre_completo%")->where('nota_tesis','>=',4)
                                    ->paginate(7);
                                    //dd($request);
                                    //dd($tesis);
                                foreach($tesis as $tes)
                                {
                                    $var_titulo=$tes->nombre_tesis;
                                    $tes->titulo=Str::limit($var_titulo,100);
                                    $var=$tes->abstract;
                                   $tes->abstract_res=Str::limit($var,309);
                                }
                                 return view('tesis.repositorio_tesis',compact('tesis'));
                                }else{
                                    if($nombre_completo==null and $nombre_tesis!=null and $abstract==null)
                                    {
                                         $tesis=DB::table('tesis')->where('fecha_presentacion_tesis','<',now())
                                         ->where('nota_tesis','>=',4)
                                         ->where('nombre_tesis','like',"%$nombre_tesis%")->paginate(7);
                                         //dd($tesis);
                                             foreach($tesis as $tes)
                                            {
                                             $var_titulo=$tes->nombre_tesis;
                                             $tes->titulo=Str::limit($var_titulo,100);
                                             $var=$tes->abstract;
                                             $tes->abstract_res=Str::limit($var,309);
                                            }
                                             return view('tesis.repositorio_tesis',compact('tesis'));
                                    }else{
                                        if($nombre_completo!=null and $nombre_tesis!=null and $abstract==null)
                                        {
                                        $tesis=DB::table('tesis')->where('fecha_presentacion_tesis','<',now())
                                        ->where('nota_tesis','>=',4)
                                         ->where('nombre_completo','like',"%$nombre_completo%")
                                         ->where('nombre_tesis','like',"%$nombre_tesis%")->paginate(7);
                                        }
                                            foreach($tesis as $tes)
                                            {
                                                $var_titulo=$tes->nombre_tesis;
                                                $tes->titulo=Str::limit($var_titulo,100);
                                                $var=$tes->abstract;
                                                $tes->abstract_res=Str::limit($var,309);
                                            }
                                            return view('tesis.repositorio_tesis',compact('tesis'));
                                            

                                    }
                                        }

                                }
                            }
                    }      
            }
        $tesis=DB::table('tesis')->where('fecha_presentacion_tesis','<',now())
        
        ->where('nombre_completo','like',"%$nombre_completo%")
        ->where('nombre_tesis','like',"%$nombre_tesis%")
        ->where('abstract','like',"%$abstract%")
        //->nombre_completo($nombre_completo)
        //->nombre_tesis($nombre_tesis)
        //->abstract($abstract)
        ->paginate(7);
        foreach($tesis as $tes)
        {
        $var_titulo=$tes->nombre_tesis;
        $tes->titulo=Str::limit($var_titulo,100);
        $var=$tes->abstract;
        $tes->abstract_res=Str::limit($var,309);
        }
        return view('tesis.repositorio_tesis',compact('tesis'));
    }

    public function mostrar_tesis($id)
        {
        //$tesis=DB::table('tesis')->where('id', $id)->first();

        $tes=DB::table('tesis')->where('id_pk',$id)->first();
        //dd($com);
            return view('tesis.mostrar_tesis',compact('tes'));
        }

    //Buscador Queryscope esta en modelo Tesis



	
    /*public function tesis_empresa()
	{

		$id=Auth::id();
		$user=User::findorfail($id);
        if($id==null or $user->tipo_usuario!=3){
            return('tesis.sinpermiso');
        }else{
        	if($user->tipo_usuario==3){
        	$tes_empresas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Empresa')->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion')->paginate(7);
        	return view('tesis.tesis_empresa',compact('tes_empresas'));
        	}
        }
    }

    

        public function tesis_proyecto(){

		$id=Auth::id();
		$user=User::findorfail($id);
        if($id==null or $user->tipo_usuario!=3){
            return('tesis.sinpermiso');
        }else{
        	if($user->tipo_usuario==3){
        	$tes_proyectos=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Proyecto')->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion')->paginate(7);
        	return view('tesis.tesis_proyecto',compact('tes_proyectos'));
        	}
        }
    }

        public function tesis_fondoconcursable(){

		$id=Auth::id();
		$user=User::findorfail($id);
        if($id==null or $user->tipo_usuario!=3){
            return('tesis.sinpermiso');
        }else{
        	if($user->tipo_usuario==3){
        	$tes_fondoconcursable=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Fondo concusable')->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion')->paginate(7);
        	return view('tesis.tesis_fondoconcursable',compact('tes_fondoconcursable'));
        	}
        }
       }

        public function tesis_comunidad(){

		$id=Auth::id();
		$user=User::findorfail($id);
        if($id==null or $user->tipo_usuario!=3){
            return('tesis.sinpermiso');
        }else{
        	if($user->tipo_usuario==3){
        	$tes_comunidad=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Comunidad')->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion')->paginate(7);
        	return view('tesis.tesis_comunidad',compact('tes_comunidad'));
        	}
        }


	}*/
    //Index para los profesores con los alumnos que tienen tesis solicitudes  de tesis con ese profesor
        public function index2()
    {
        $id=Auth::id();
        if($id==null){
            return('tesis.sinpermiso');
        }
        $user=User::findorfail($id);
        //dd($user->name);
        $tesistas=DB::table('tesis')->where('profesor_guia','=',$user->name)->orderby('fecha_peticion','desc')->paginate(7);
        return view('tesis.index2',compact('tesistas','user'));

    }

    //Index para los profesores con los alumnos que tienen tesis inscritas con ese profesor

        public function index2_ins_pro()
    {
        $id=Auth::id();
        $user=User::findorfail($id);
        if($id==null){
            return('tesis.sinpermiso');
        }else{
            if($user->tipo_usuario==2){
                $user=User::findorfail($id);
                //dd($user->name);
                $tesistas=DB::table('tesis')->where('profesor_guia','=',$user->name)->orderby('fecha_peticion','desc')->paginate(7);
                return view('tesis.index2_ins_pro',compact('tesistas','user'));
            }else{
                return view('tesis.sinpermiso');
            }
        }
        

    }


    //Index de solicitudes para el director de tesis, pregunto si el usuario es director de tesis, de lo contrario
    //se envia a la vista sinpermiso, si es director tesis entonces se hace la consulta con los casos de los respectivos valores  para estado1 y estado2, para que la tesis se encuentre en el estado de solicitud y sea vista por el director de tesis una vez eenviada por el profesor.    

      public function index3_solicitudes()
    {
        $id=Auth::id();
        if($id==null){
            return view ('tesis.sinpermiso');
        }
        $user=User::findorfail($id);
        if($user->tipo_usuario==3){
        $tesistas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1',2)->where('estado2',1)->orwhere('estado1',3)->where('estado2',1)->paginate(7);
        return view('tesis.index3_sol',compact('tesistas','user'));
       }else{
       	return view('tesis.sinpermiso');
       }

    }

    //En esta vista el director de tesis puede ver las tesis inscritas.

    public function index3_inscritas()
    {
        $id=Auth::id();
        if($id==null){
            return view ('tesis.sinpermiso');
        }
        $user=User::findorfail($id);
        if($user->tipo_usuario==3){
        $tesistas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->paginate(7);
        //dd($tesistas);
         foreach($tesistas as $tesis)
        {
        $tesis->alumno1_res=Str::limit($tesis->nombre_completo,12);
        $tesis->alumno2_res=Str::limit($tesis->nombre_completo2,12);
        $tesis->nombre_tes_res=Str::limit($tesis->nombre_tesis,30);
        $tesis->nombre_profe_res=Str::limit($tesis->profesor_guia,8);
        $tesis->area=Str::limit($tesis->area_tesis,10);
        }
        //dd($tesistas);
        return view('tesis.index3_ins',compact('tesistas','user'));
       }else{
       	return view('tesis.sinpermiso');
       }

    }

    //Vista para imprimir tesis inscritas en un intervalo de tiempo, recibo las fechas del formulario "rango_fechas", y 

    public function imprimir_tesis_inscritas(Request $request)
    {
        $fecha_inicio=$request->fecha_inicio;
        $fecha_final=$request->fecha_final;
        $id=Auth::id();
        if($id==null){
            return view ('tesis.sinpermiso');
        }
        $user=User::findorfail($id);
        if($user->tipo_usuario==3){
        $tesistas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->whereBetween('fecha_inscripcion',[$fecha_inicio,$fecha_final])->get();
        //dd($tesistas);
        return view('tesis.imprimir_tesis_inscritas',compact('tesistas','user'));
       }else{
        return view('tesis.sinpermiso');
       }

    }

    public function imprimir_todas_tesis_ins()
    {
        $id=Auth::id();
        if($id==null){
            return view ('tesis.sinpermiso');
        }
        $user=User::findorfail($id);
        if($user->tipo_usuario==3){
        $tesistas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->get();
        //dd($tesistas);
        return view('tesis.imprimir_todas_tesis_ins',compact('tesistas','user'));
       }else{
        return view('tesis.sinpermiso');
       }

    }

    /* public function imprimir_todas_tesis_sol()
    {
        $id=Auth::id();
        if($id==null){
            return view ('tesis.sinpermiso');
        }
        $user=User::findorfail($id);
        if($user->tipo_usuario==3){
        $tesistas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',2)->where('estado2','=',1)->orwhere('estado1','=',3)->where('estado2','=',1)->get();
        //dd($tesistas);
        return view('tesis.imprimir_todas_tesis_sol',compact('tesistas','user'));
       }else{
        return view('tesis.sinpermiso');
       }

    }*/

        //Muestra tesis del alumno.
        public function index1()
    {
        $id=Auth::id();
        $alumno=User::findorfail($id);
        $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
        //dd($id);
        if($id==null){
            return('tesis.sinpermiso');
        }
        $user=User::findorfail($id);
        //dd($user);
        $tesistas=DB::table('tesis')->where('nombre_completo','=',$user->name)->orwhere('nombre_completo2','=',$user->name)->paginate(7);
        //dd($tesistas);

          $j=0;
          foreach($tesistas as $tesista);
        $area_tesis=DB::table('area_tesis')->get();
        $empresas=DB::table('empresas')->get();
        $comunidads=DB::table('comunidad')->get();
        $fcs=DB::table('fondo_concursable')->get();
        $proyectos=DB::table('proyectos')->get();
        //dd($area_tesis);
        //dd($nota_tesis);
        //dd($tesistas->isEmpty());
        //En caso de que no hayan tesis inscritas, ocurre que se redirecciona al formulario de inscribir tesis.
        if($tesistas->isEmpty()==true){
        return view('tesis.create',compact('alumno','profes','area_tesis','empresas','comunidads','fcs','proyectos'));
        }else{
            //dd($tesistas->isEmpty());
            if($tesistas->isEmpty()==false){
                //En caso de que si haya tesis inscritas para el alumno logueado, se mostrará la lista con las tesis inscritas de este alumno.
            return view('tesis.index1',compact('tesistas','user'));
                }
        }
        

    }


	public function index()
    {
        
        $tesistas=DB::table('tesis')->paginate(7);
        return view('tesis.index',compact('tesistas'));

    }

  
     public function create()
    {
        //

        $id=Auth::id();
        $alumno=User::findorfail($id);
        $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
        //Si el segundo alumno inscrito en la tesis quiere inscribir el ahora la tesis, entonces para ello deberá tener nota inferior a 4.
          $tesistas=DB::table('tesis')->where('nombre_completo',$alumno->name)->orwhere('nombre_completo2',$alumno->name)->get();
          //dd($tesistas);
          $cont=0;
          foreach($tesistas as $tesista)
          {
            if($tesista->nombre_completo==$alumno->name or $tesista->nombre_completo2)
            {
                $cont=$cont+1;
            }
          }
          if($cont==3){
            return view('tesis.hareprobado3veces');
          }

          $j=0;
          foreach($tesistas as $tesista)
          {
            if($tesista->nota_tesis>=4)
            {
                 return view('tesis.tesis_aprobada');
            }
            if($tesista->nota_tesis==null){
                return view('tesis.tesisregistrada');
        }
        }
        $area_tesis=DB::table('area_tesis')->get();
        $empresas=DB::table('empresas')->get();
        $comunidads=DB::table('comunidad')->get();
        $fcs=DB::table('fondo_concursable')->get();
        $proyectos=DB::table('proyectos')->get();
        //dd($area_tesis);
        //dd($nota_tesis);
        if($tesistas->isEmpty()==true or $tesista->nota_tesis<4){
        return view('tesis.create',compact('alumno','profes','area_tesis','empresas','comunidads','fcs','proyectos'));
        }
    }

    public function tesis_aprobada()
    {

        return view('tesis.tesis_aprobada');
    }

    public function error_rut()
    {

        return view('tesis.error_rut');
    }

     public function usuario_no_existe()
    {

        return view('tesis.usuario_no_existe');
    }

    //Almacena los datos de la tabla tesis llenada preliminarmente por el alumno.
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'nombre_completo' => 'required|string',
            'rut' => 'required|string|min:11|max:12',
            'ano_ingreso' => 'required|integer',
            'telefono1'=> 'required|string',
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
        $id=Auth::id();
        $user=User::findorfail($id);
        //si usuario es de tipo alumno entonces se actualizara el nombre usuario en user
        if($id==null){
            return view('tesis.sinpermiso');
        }
        /*DB::table('users')->insert([
            'name' => $request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'tipo_usuario' => $request->tipo_usuario,
            'rut' =>$request->rut,
        ]);*/
            //dd($request->nombre_completo);
        //En caso de que complete 3 de los 4 campos del segundo alumno tesista
        //dd($request);
        //dd($request);
        if(($request->nombre_completo2==null and $request->rut2!=null and $request->ano_ingreso2!=null and $request->telefono2!=null)or($request->nombre_completo2!=null and $request->rut2==null and $request->ano_ingreso2!=null and $request->telefono2!=null)or($request->nombre_completo2!=null and $request->rut2!=null and $request->ano_ingreso2==null and $request->telefono2!=null)or($request->nombre_completo2!=null and $request->rut2!=null and $request->ano_ingreso2!=null and $request->telefono2==null)or($request->nombre_completo2!=null and $request->rut2==null and $request->ano_ingreso2==null and $request->telefono2!=null)or($request->nombre_completo2==null and $request->rut2!=null and $request->ano_ingreso2==null and $request->telefono2!=null)or($request->nombre_completo2==null and $request->rut2!=null and $request->ano_ingreso2!=null and $request->telefono2==null)or($request->nombre_completo2==null and $request->rut2==null and $request->ano_ingreso2!=null and $request->telefono2!=null)or($request->nombre_completo2==null and $request->rut2==null and $request->ano_ingreso2==null and $request->telefono2!=null)or($request->nombre_completo2==null and $request->rut2==null and $request->ano_ingreso2!=null  and $request->telefono2==null)or($request->nombre_completo2==null and $request->rut2!=null and $request->ano_ingreso2==null and $request->telefono2==null)or($request->nombre_completo2!=null and $request->rut2==null and $request->ano_ingreso2==null and $request->telefono2==null))
        {
        //dd($request->nombre_completo2);
            return view('tesis.error_campos');
        }
        $rut1=DB::table('tesis')->get();
        $rut2=DB::table('tesis')->get();
        $contador=0;
        $buscar_segundo_alumno_user=DB::table('users')->where('name','=',$request->nombre_completo2)->get();
        $buscar_segundo_alumno_tesis=DB::table('tesis')->where('nombre_completo','=',$request->nombre_completo2)->orwhere('nombre_completo2','=',$request->nombre_completo2)->get();
        $buscar_primer_alumno_tesis=DB::table('tesis')->where('nombre_completo','=',$request->nombre_completo)->orwhere('nombre_completo2','=',$request->nombre_completo)->get();
        $users=DB::table('users')->first();
     
        
        //Si el usuario no existe en el registro de usuario entonces no podra registrarse segundo alumno
        //dd($buscar_segundo_alumno_user); 
          
   
        //buscar si el alumno ya tiene una tesis creada
        //dd($buscar_segundo_alumno_tesis);
        //dd($buscar_segundo_alumno_tesis->isEmpty());
       //dd($buscar_primer_alumno_tesis);
        $id=Auth::id();
        $user=User::findorfail($id);
          foreach($buscar_primer_alumno_tesis as $tesista1);
        foreach($buscar_segundo_alumno_tesis as $tesista2);
        //dd($request);
        if($user->tipo_usuario==1 and $request->nombre_completo2!=null and $request->rut2!=null and $request->ano_ingreso2!=null){ 
            //dd('buscar_segundo_alumno_user'=> $buscar_segundo_alumno_user);
            //dd($buscar_segundo_alumno_user->isEmpty());
            //dd($buscar_segundo_alumno_user);
            if(($buscar_segundo_alumno_user->isEmpty())==true){
                 return view('tesis.usuario_no_existe');
                //echo 'Si son iguales';
            }

               //En caso de que el rut ya exista en la bd.
        //dd($rut1);
        foreach($rut1 as $rut)
        {
            if(($rut->rut==$request->rut2 and $tesista2->nota_tesis>4) or ($rut->rut==$request->rut2 and $tesista2->nota_tesis==null)){
                return view('tesis.error_rut');
            }
        }

        foreach($rut2 as $rut)
        {
            if(($rut->rut2==$request->rut2 and $tesista2->nota_tesis>4) or ($rut->rut2==$request->rut2 and $tesista2->nota_tesis==null)){
                return view('tesis.error_rut');
            }
        }

        foreach($rut1 as $rut)
        {
            if(($rut->rut==$request->rut2 and $tesista1->nota_tesis>4) or ($rut->rut==$request->rut2 and $tesista1->nota_tesis==null)){
                return view('tesis.error_rut');
            }
        }

        foreach($rut2 as $rut)
        {
            if(($rut->rut2==$request->rut2 and $tesista1->nota_tesis>4) or ($rut->rut2==$request->rut2 and $tesista1->nota_tesis==null)){
                return view('tesis.error_rut');
            }
        }

            if(($buscar_segundo_alumno_tesis->isEmpty())==false and $tesista1->nota_tesis>4){
            return view('tesis.tesisregistrada');
            }
            $user->name=$request->nombre_completo;
            $user->save();
    //dd($request);
            DB::table('tesis')->insert([
                'id' => $id,
                'nombre_completo' => $request->nombre_completo,
                'nombre_completo2' => $request->nombre_completo2,
                'rut' =>$request->rut,
                'rut2' =>$request->rut2,
                'ano_ingreso' => $request->ano_ingreso,
                'ano_ingreso2' => $request->ano_ingreso2,
                 'telefono1' => $request->telefono1,
                 'telefono2' => $request->telefono2,
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
    }

        if($user->tipo_usuario==1 and $request->nombre_completo2==null and $request->rut2==null and $request->ano_ingreso2==null){ 
            $user->name=$request->nombre_completo;
            $user->save();
        foreach($rut1 as $rut)
        {
            if(($rut->rut==$request->rut2 and $tesista1->nota_tesis>4) or ($rut->rut==$request->rut2 and $tesista1->nota_tesis==null)){
                return view('tesis.error_rut');
            }
        }

        foreach($rut2 as $rut)
        {
            if(($rut->rut==$request->rut2 and $tesista1->nota_tesis>4) or ($rut->rut==$request->rut2 and $tesista1->nota_tesis==null)){
                return view('tesis.error_rut');
            }
        }
            DB::table('tesis')->insert([
                'id' => $id,
                'nombre_completo' => $request->nombre_completo,
                'rut' =>$request->rut,
                'ano_ingreso' => $request->ano_ingreso,
                'telefono1'=> $request->telefono1,
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
    }

    return  view('alumnohome');

}
        

        //Muestra la informacion de la tesis    
        public function show($id)
        {
        //$tesis=DB::table('tesis')->where('id', $id)->first();

        $tesis=DB::table('tesis')->where('id_pk',$id)->first();
        $comision=DB::table('comision')->where('id',$id)->first();
        //dd($com);
        return view('tesis.show',compact('tesis','comision'));
        }

        //Permite editar el formulario al alumno
        public function edit($id)
        {
            //$user = DB::table('users')->where('id', $id)->first();
            //return view('users.edit',compact('user'));
                $idlogin=Auth::id();
                $user=User::findorfail($idlogin);
                //dd($user);
                $tesis = DB::table('tesis')->where('id_pk',$id)->get();
                foreach($tesis as $tes);
                $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                $area_tesis=DB::table('area_tesis')->get();
                $empresas=DB::table('empresas')->get();
                $comunidads=DB::table('comunidad')->get();
                $fcs=DB::table('fondo_concursable')->get();
                 $proyectos=DB::table('proyectos')->get();
            if(!Auth::id()){
                return view('tesis.sinpermiso');
            }elseif($user->tipo_usuario==1 and $tes->estado1==1 and $tes->estado2==null){
               
                //$tes->estado1=2;
                //$tes->update();
                return view('tesis.edit',compact('tes','profes','area_tesis','empresas','comunidads','fcs','proyectos'));
                //return $user;
            }elseif($user->tipo_usuario==1 and$tes->estado1==5 and $tes->estado2==null){
            DB::table('tesis')->where('id_pk', $id)->update(['estado1' => 1]);
            DB::table('tesis')->where('id_pk', $id)->update(['estado2' => null]);
            DB::table('tesis')->where('id_pk', $id)->update(['estado3' => 1]);
            return view('tesis.edit',compact('tes','profes','area_tesis','empresas','comunidads','fcs','proyectos')); 
            }else{
                return view('tesis.noeditartesis');
            }
        }




        public function pedir_nota_pendiente($id)
        {
            //$user = DB::table('users')->where('id', $id)->first();
            //return view('users.edit',compact('user'));
                //dd($id);
                $idlogin=Auth::id();
                $user=User::findorfail($idlogin);
                $tesis=DB::table('tesis')->where('id_pk',$id)->get();
                foreach($tesis as $tes);
                //dd($tes);
                //$profes=DB::table('users')->where('tipo_usuario','=',2)->get();
            

            if(!Auth::id()){
                return view('tesis.sinpermiso');
            }elseif($user->tipo_usuario==1 and $tes->estado1==4 and $tes->estado2==1){
               
                //$tes->estado1=2;
                //$tes->update();
                return view('tesis.pedir_nota_pendiente',compact('tes'));
                //return $user; 
            }else{
                return view('tesis.noeditartesis');
            }
        }

        public function save_nota_pendiente(Request $request, $id)
        {

        		$tes=Tesis::findorfail($id);
        		$tes->nota_pendiente=$request->get('nota_pendiente');
        		$tes->update();

        		return view('alumnohome');
        }

           public function pedir_nota_prorroga($id)
        {
            //$user = DB::table('users')->where('id', $id)->first();
            //return view('users.edit',compact('user'));
                $idlogin=Auth::id();
                $user=User::findorfail($idlogin);
                $tesis=DB::table('tesis')->where('id_pk',$id)->get();
                foreach($tesis as $tes);
                //dd($tes);
                //$profes=DB::table('users')->where('tipo_usuario','=',2)->get();
            $user=User::findorfail($idlogin);
        	//dd($user->name);

            if(!Auth::id()){
                return view('tesis.sinpermiso');
            }elseif($user->tipo_usuario==1 and $tes->estado1==4 and $tes->estado2==1){
               
                //$tes->estado1=2;
                //$tes->update();
                return view('tesis.pedir_nota_prorroga',compact('tes'));
                //return $user; 
            }else{
                return view('tesis.sinpermiso');
            }
        }

          public function save_nota_prorroga(Request $request, $id)
        {

        		$tesis=DB::table('tesis')->where('id_pk',$id)->get();
                foreach($tesis as $tes);
                DB::table('tesis')->where('id_pk',$id)->update(['nota_prorroga' => $request->nota_prorroga]);
        		//$tes->nota_prorroga=$request->get('nota_prorroga');
                 DB::table('tesis')->where('id_pk',$id)->update(['estado5' => null]);
                 DB::table('tesis')->where('id_pk',$id)->update(['estado7' => null]);
        	//dd($user->name);
        	//$tesistas=DB::table('tesis');
        		return view('alumnohome');
        }

    function noeditartesis(){

    return view('tesis.noeditartesis');
        }

   
   //Aca el profesor editar el formulario solo si estado1=1, lo que quiere decir que el alumno a completado preliminarmente el formulario, luego si el mismo profesor a editado, entonces estado1=2 y estado2=null, entonces si lo ha enviado(estado1=2, estado2=1) al director de tesis aun puede editar. En caso de que el formulario sea rechazado por el director de tesis el profesor puede modificarlo.
    public function edit2($id)
    {
        if(!Auth::id()){
            return view('tesis.sinpermiso');
        }else{

            $idlogin=Auth::id();
            $user=User::findorfail($idlogin);
            //dd($user);
            //dd($id);
            $tesis =DB::table('tesis')->where('id_pk',$id)->get();
            foreach($tesis as $tes);
            //dd($id);
            //$tes=Tesis::findorfail($id);
            //dd($tes->estado1);
            $com =Comision::find($id);
            $area_tesis=DB::table('area_tesis')->get();
            $empresas=DB::table('empresas')->get();
            $comunidads=DB::table('comunidad')->get();
            $fcs=DB::table('fondo_concursable')->get();
             $proyectos=DB::table('proyectos')->get();
            //dd($com);
            //if($com==null){
            //dd($com);
            if($user->tipo_usuario==2 and(($tes->estado1==1 and $tes->estado2==null))){           
                $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                DB::table('tesis')->where('id_pk', $id)->update(['estado1' => 2]);
                $cap=null;
                //dd($cap);
                return view('tesis.edit2',compact('tes','profes','com','area_tesis','empresas','comunidads','fcs','proyectos','cap'));
            }
            if($user->tipo_usuario==2 and $tes->estado1==2 and $tes->estado2==null)
            {           
            $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
            //$tes->estado1=3;
            //$tes->update();
            $caps=DB::table('capitulos')->where('id',$id)->get();
            if($caps->isEmpty()==true)
            $cap=null;
            foreach($caps as $cap);
            //dd($caps);
            //dd($cap);
           return view('tesis.edit2',compact('tes','profes','com','area_tesis', 'empresas','comunidads','fcs','proyectos','cap'));
           }
                if($user->tipo_usuario==2 and $tes->estado1==2 and $tes->estado2==1){           
                $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                $caps=DB::table('capitulos')->where('id',$id)->get();
                //dd($caps);
                foreach($caps as $cap);
                //dd($cap);
                //$tes->estado1=3;
                //$tes->update();
                return view('tesis.edit2',compact('tes','profes','com','area_tesis', 'empresas','comunidads','fcs','proyectos','cap'));
            	}elseif($user->tipo_usuario==2 and $tes->estado1==5 and $tes->estado2==null){
            		//$tes->estado1=2;
                   // DB::table('tesis')->where('id_pk', $id)->update(['estado1' => 2]);
            		//$tes->estado2=null;
                    //DB::table('tesis')->where('id_pk', $id)->update(['estado2' => null]);
            		//$tes->estado3=1;
                    DB::table('tesis')->where('id_pk', $id)->update(['estado3' => 1]);
            	 	//$tes->update();
                    //dd($tes);
            		$profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                    $caps=DB::table('capitulos')->where('id',$id)->get();
                    foreach($caps as $cap);
                    //dd($cap);
                return view('tesis.edit2',compact('tes','profes','com','area_tesis','empresas','comunidads','fcs','proyectos','cap'));
                }else{
            		return view('tesis.noeditartesis_profe');
                //}
                }/*else{
                    if($com!=null)
                    {

                if($user->tipo_usuario==2 and(($tes->estado1==1 and $tes->estado2==null))){           
                $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                $tes->estado1=2;
                $tes->update();
                return view('tesis.edit2',compact('tes','profes','com'));
            }
            if($user->tipo_usuario==2 and $tes->estado1==2 and $tes->estado2==null)
            {           
            $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
            //$tes->estado1=3;
            //$tes->update();
           return view('tesis.edit2',compact('tes','profes','com'));
           }
                if($user->tipo_usuario==2 and $tes->estado1==2 and $tes->estado2==1){           
                $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                //$tes->estado1=3;
                //$tes->update();
                return view('tesis.edit2',compact('tes','profes','com'));
                }elseif($user->tipo_usuario==2 and $tes->estado1==5 and $tes->estado2==null){
                    $tes->estado1=2;
                    $tes->estado2=null;
                    $tes->estado3=1;
                    $tes->update();
                    $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                return view('tesis.edit2',compact('tes','profes','com'));

                    }
                }*/
                        }
    }

   //En caso de que el director de tesis edite el formulario entonces ocurre que el profesor en estado1=3 y ya no podra editar el profesor.

    public function edit3($id){
        //dd($id);
        if(!Auth::id()){
            return view('tesis.sinpermiso');
        }else{
            //dd($id);
        	$idlogin=Auth::id();
	        $user=User::findorfail($idlogin);
	        $tesis=DB::table('tesis')->where('id_pk',$id)->get();
            foreach($tesis as $tes);
	        $com=Comision::find($id);
            $area_tesis=DB::table('area_tesis')->get();
            $empresas=DB::table('empresas')->get();
            $comunidads=DB::table('comunidad')->get();
            $fcs=DB::table('fondo_concursable')->get();
             $proyectos=DB::table('proyectos')->get();
            //dd($com);
            if($user->tipo_usuario==3 && $tes->estado1==2 && $tes->estado2==1 ){           
                $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                $tes->estado1=3;
                DB::table('tesis')->where('id_pk', $id)->update(['estado1' => 3]);
                //dd($tes->tipo_vinculacion);
                return view('tesis.edit3',compact('tes','profes','com','area_tesis','empresas','comunidads','fcs','proyectos'));
            }else{
            	if($user->tipo_usuario==3 && $tes->estado1==3 && $tes->estado2==1 ){           
                $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                //dd($tes->tipo_vinculacion);
                return view('tesis.edit3',compact('tes','profes','com','area_tesis','empresas','comunidads','fcs','proyectos'));
            }else{
            	return view('tesis.sinpermiso');
            }
        }

	} 
}

    //vista en caso de que usuario no tenga permiso para acceder a esta.
    public function sinpermiso(){

    return view('tesis.sinpermiso');
        }

        //El director de tesis realiza al hacer click en evaluar se pasa a estado1=3 estado2=1
       public function evaluar_director(Request $request,$id)
    {
        if(!Auth::id()){
            return view('tesis.sinpermiso');
        }else{
            //dd($request);
            $idlogin=Auth::id();
            $user=User::findorfail($idlogin);
            if($user->tipo_usuario==3){           
        $tesis=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesis as $tes);
        $comision=DB::table('comision')->where('id',$id)->first();
        $tes->estado1=3;
        DB::table('tesis')->where('id_pk', $id)->update(['estado1' => 3]);
                return view('tesis.evaluar_director',compact('tes','comision'));
            }

        } 
    }

    //Esta funcion recibe los datos de la evaluacion del profesor, en caso de que venga del alumno al ser evaluado pasará de estado1=1, a estado2=1, si el formulario de tesis fue rechazado esto es, estado1=5 y estado2=null,por el director y que el profesor sea quien lo modifique primero nuevamente, los valores de tesis volverán estado1=2, y estado2=1.
    public function evaluar($id)
    {
        if(!Auth::id()){
            return view('tesis.sinpermiso');
        }else{
            //dd($id);
            $idlogin=Auth::id();
            $user=User::findorfail($idlogin);
            $tesis=DB::table('tesis')->where('id_pk',$id)->get();
            foreach($tesis as $tes);
        	$comision=DB::table('comision')->where('id',$id)->first();
            $com=DB::table('comision')->where('id',$id)->first();
            $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
             $area_tesis=DB::table('area_tesis')->get();
            $empresas=DB::table('empresas')->get();
            $comunidads=DB::table('comunidad')->get();
            $fcs=DB::table('fondo_concursable')->get();
             $proyectos=DB::table('proyectos')->get();
            if($comision==null){
                //dd($comision);
                return view('tesis.edit2',compact('tes','com','profes','area_tesis'));
            }
            if($user->tipo_usuario==2 and (($tes->estado1==1) or ($tes->estado1==2))){         
        $tes->estado1=2;
        DB::table('tesis')->where('id_pk',$id)->update(['estado1' =>  $tes->estado1]);
        DB::table('tesis')->where('id_pk',$id)->update(['avance_general' => 0]);
                return view('tesis.evaluar',compact('tes','comision'));
            }else{
            	if($user->tipo_usuario==2 and $tes->estado1==5 and $tes->estado2==null){
            		$tes->estado1=2;
                    DB::table('tesis')->where('id_pk',$id)->update(['estado1' =>  $tes->estado1]);
            		$tes->estado2=null;
                    DB::table('tesis')->where('id_pk',$id)->update(['estado2' =>  $tes->estado2]);
            		 $tes->estado3=1;
                     DB::table('tesis')->where('id_pk',$id)->update(['estado3' =>  $tes->estado3]);
                     DB::table('tesis')->where('id_pk',$id)->update(['avance_general' => 0]);
            		$profes=DB::table('users')->where('tipo_usuario','=',2)->get();
            	}else{
            	return view('tesis.noeditartesis_profe');
            }
           }

        } 
    }



    public function llamar_filtro_pendiente_vencida()
    {
    	return view('tesis.filtro_pendiente_vencida');
    }	


    public function llamar_filtro_prorroga_vencida()
    {
    	return view('tesis.filtro_prorroga_vencida');
    }	


    public function llamar_filtro_pendiente_prorroga_vencida()
    {
        return view('tesis.filtro_pendiente_prorroga_vencida');
    }   



    public function filtro_nota_pendiente_prorroga(Request $request){

        //dd($request);
        $fecha_inicio=$request->fecha_inicio;
        $fecha_final=$request->fecha_fin;
        //Suponiendo que se desea saber las notas pendientes vencidas dentro de un determinado intervalo de tiempo
        
        /*$data=[
        'data1'=> DB::table('tesis')->whereNotNull('nota_prorroga')->whereBetween('nota_prorroga',[$fecha_inicio,$fecha_final])->get(),
      
        'data2' => DB::table('tesis')->whereNull('nota_prorroga')->whereBetween('nota_pendiente', [$fecha_inicio,$fecha_final])->get()];*/
       

       $data= DB::table('tesis')->whereNotNull('nota_prorroga')->whereBetween('nota_prorroga',[$fecha_inicio,$fecha_final])->orwhereNull('nota_prorroga')->whereBetween('nota_pendiente', [$fecha_inicio,$fecha_final])->get();
       //dd($notas_pendientes_vencidas);

       //Consulta en caso de que se desee conocer todas las notas pendientes vencidas inclusive anterior al intervalo definido por la consulta//
        //dd($request);
        //$notas_pendientes_vencidas=DB::table('tesis')->whereNull('nota_prorroga')->where('nota_pendiente','<=',$request->fecha_final)->get();
        //dd($data);
          return view('tesis.filtro_pend_pro',[
             'notas_pend_pro_vencidas' => $data,
            'fecha_inicio' => $fecha_inicio,
            'fecha_final' => $fecha_final]);

       
    }

    //Imprime notas pendientes y de prorroga en pdf

    public function imprimir_nota_pendpro_venc(Request $request){

        $fecha_inicio=$request->fecha_inicio;
        $fecha_final=$request->fecha_final;
          $data= DB::table('tesis')->whereNotNull('nota_prorroga')->whereBetween('nota_prorroga',[$fecha_inicio,$fecha_final])->orwhereNull('nota_prorroga')->whereBetween('nota_pendiente', [$fecha_inicio,$fecha_final])->get();
        //Suponiendo que se desea saber las notas pendientes que venceran dentro de un determinado intervalo de tiempo
        
       //dd($notas_pendientes_vencidas);

       //Consulta en caso de que se desee conocer todas las notas pendientes vencidas inclusive anterior al intervalo definido por la consulta//
        //dd($request);
        //$notas_pendientes_vencidas=DB::table('tesis')->whereNull('nota_prorroga')->where('nota_pendiente','<=',$request->fecha_final)->get();

       return view('tesis.imprimir_notas_pend_pro_venc',[
        'notas_pend_pro_vencidas' => $data,
            'fecha_inicio' => $fecha_inicio,
            'fecha_final' => $fecha_final]);
    }


     public function filtro_nota_pendiente(Request $request){

    	$fecha_inicio=$request->fecha_inicio;
    	$fecha_final=$request->fecha_fin;
        //Suponiendo que se desea saber las notas pendientes vencidas dentro de un determinado intervalo de tiempo
       	$data=DB::table('tesis')->whereNull('nota_prorroga')->whereBetween('nota_pendiente', [$fecha_inicio,$fecha_final])->get();
       //dd($notas_pendientes_vencidas);

       //Consulta en caso de que se desee conocer todas las notas pendientes vencidas inclusive anterior al intervalo definido por la consulta//
    	//dd($request);
        //$notas_pendientes_vencidas=DB::table('tesis')->whereNull('nota_prorroga')->where('nota_pendiente','<=',$request->fecha_final)->get();

       return view('tesis.filtro_pendiente',[
        'notas_pendientes_vencidas' => $data,
            'fecha_inicio' => $fecha_inicio,
            'fecha_final' => $fecha_final]);
    }

    //Esta vista permite imprimir las notas de pendientes vencidas en un intervalo de tiempo dado.
    public function imprimir_nota_pend_venc(Request $request){

        $fecha_inicio=$request->fecha_inicio;
        $fecha_final=$request->fecha_final;
        //Suponiendo que se desea saber las notas pendientes vencidas dentro de un determinado intervalo de tiempo
        $data=DB::table('tesis')->whereNull('nota_prorroga')->whereBetween('nota_pendiente', [$fecha_inicio,$fecha_final])->get();

        return view('tesis.imprimir_notas_pend_venc',[
            'notas_pendientes_vencidas' => $data,
            'fecha_inicio' => $fecha_inicio,
            'fecha_final' => $fecha_final
        ]);
    }


      public function filtro_nota_prorroga(Request $request)
    {
    	$fecha_inicio=$request->fecha_inicio;
    	$fecha_final=$request->fecha_fin;
        $data=DB::table('tesis')->whereNotNull('nota_prorroga')->whereBetween('nota_prorroga',[$fecha_inicio,$fecha_final])->get();
       return view('tesis.filtro_prorroga',[
            'notas_prorrogas_vencidas' => $data,
            'fecha_inicio' => $fecha_inicio,
            'fecha_final' => $fecha_final
        ]);
    }

    //Esta vista permite imprimir las notas de prorroga vencidas en un intervalo de tiempo dado.
     public function imprimir_nota_pro_venc(Request $request){

        
        $fecha_inicio=$request->fecha_inicio;
        $fecha_final=$request->fecha_final;
        //Suponiendo que se desea saber las notas pendientes vencidas dentro de un determinado intervalo de tiempo
        $data=DB::table('tesis')->whereNotNull('nota_prorroga')->whereBetween('nota_prorroga', [$fecha_inicio,$fecha_final])->get();

        return view('tesis.imprimir_notas_pro_venc',[
            'notas_pendientes_vencidas' => $data,
            'fecha_inicio' => $fecha_inicio,
            'fecha_final' => $fecha_final
        ]);
    }


    //Recibe los datos de tesis insertados por el alumno en un inicio.
    public function update(Request $request,$id)
    {
        //estado2==0 es que ha sido rechazado por director de tesis
        //dd($request);
        //dd($id_pk);
        $tesis=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesis as $tes);
        //dd($tes);
        if($tes->estado1==1  or ($tes->estado1==2 and $tes->estado2=null))
        {
        $tes->nombre_completo=$request->get('nombre_completo');
        DB::table('tesis')->where('id_pk',$id)->update(['nombre_completo' =>  $tes->nombre_completo]);
        $tes->rut=$request->get('rut');
        DB::table('tesis')->where('id_pk',$id)->update(['rut' =>  $tes->rut]);
        $tes->ano_ingreso=$request->get('ano_ingreso');
        DB::table('tesis')->where('id_pk',$id)->update(['ano_ingreso' =>  $tes->ano_ingreso]);
        //En caso de que se ingresen los datos del segundo alumno tesista
        if($request->get('nombre_completo2')!=null){
            $tes->nombre_completo2=$request->get('nombre_completo2');
            DB::table('tesis')->where('id_pk',$id)->update(['nombre_completo2' =>  $tes->nombre_completo2]);
        }
         if($request->get('rut2')!=null){
            $tes->rut2=$request->get('rut2');
            DB::table('tesis')->where('id_pk',$id)->update(['rut2' =>  $tes->rut2]);
        }
         if($request->get('ano_ingreso2')!=null){
            $tes->ano_ingreso2=$request->get('ano_ingreso2');
            DB::table('tesis')->where('id_pk',$id)->update(['ano_ingreso2' =>  $tes->ano_ingreso2]);
        }
         if($request->get('telefono2')!=null){
            $tes->telefono2=$request->get('telefono2');
            DB::table('tesis')->where('id_pk',$id)->update(['telefono2' =>  $tes->telefono2]);
        }
        $tes->profesor_guia=$request->get('profesor_guia');
        DB::table('tesis')->where('id_pk',$id)->update(['profesor_guia' =>  $tes->profesor_guia]);
        $tes->nombre_tesis=$request->get('nombre_tesis');
        DB::table('tesis')->where('id_pk',$id)->update(['nombre_tesis' =>  $tes->nombre_tesis]);
        $tes->area_tesis=$request->get('area_tesis');
        DB::table('tesis')->where('id_pk',$id)->update(['area_tesis' =>  $tes->area_tesis]);
        $tes->carrera=$request->get('carrera');
        DB::table('tesis')->where('id_pk',$id)->update(['carrera' =>  $tes->carrera]);
        $tes->telefono1=$request->get('telefono1');
        DB::table('tesis')->where('id_pk',$id)->update(['telefono1' =>  $tes->telefono1]);
        $tes->tipo_vinculacion=$request->get('tipo_vinculacion');
        DB::table('tesis')->where('id_pk',$id)->update(['tipo_vinculacion' =>  $tes->tipo_vinculacion]);
        $tes->nombre_vinculacion=$request->get('nombre_vinculacion');
        DB::table('tesis')->where('id_pk',$id)->update(['nombre_vinculacion' =>  $tes->nombre_vinculacion]);
        $tes->tipo=$request->get('tipo');
        DB::table('tesis')->where('id_pk',$id)->update(['tipo' =>  $tes->tipo]);
        $tes->descripcion=$request->get('descripcion');
        DB::table('tesis')->where('id_pk',$id)->update(['descripcion' =>  $tes->descripcion]);
        $tes->objetivos=$request->get('objetivos');
        DB::table('tesis')->where('id_pk',$id)->update(['objetivos' =>  $tes->objetivos]);
        $tes->contribucion=$request->get('contribucion');
        DB::table('tesis')->where('id_pk',$id)->update(['contribucion' =>  $tes->contribucion]);
        $user=User::findorfail($tes->id);
        $user->name=$tes->nombre_completo;
        $user->update();
        return view('alumnohome');
        }else{
             return back()->with('status','El registro de tesis ha fallado');
        }
    }

    //Se guardan los datos editados por profesor, del formulario de tesis.

    public function update2(Request $request,$id)
    {

        //dd($request);
        $request->validate([
            'profesor_guia' => 'required|string',
            'nombre_completo' => 'required|string',
            'rut' => 'required|string|min:11|max:12',
            'telefono1' => 'required|string',
            'ano_ingreso' => 'required|integer',
            'profesor1_comision' => 'required|string',
            'profesor2_comision' => 'required|string',
            'profesor3_comision' =>'string',
        ]);
        //dd($request);
        $idlogin=Auth::id();
        $user=User::findorfail($idlogin);
        if($idlogin==null){
            return view('tesis.sinpermiso');
        }
        //dd($id);
        //return 'tamos';
        //dd($id);
        $idlogin=Auth::id();
        $profe=User::findorfail($idlogin);
        $tesis=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesis as $tes);
        //dd($tes);
        $profesor_guia=$request->get('profesor_guia');
        $profesor1_comision=$request->get('profesor1_comision');
        $profesor2_comision=$request->get('profesor2_comision');
        $profesor3_comision=$request->get('profesor3_comision');
        //Para quee el profesor no sea seleccionado 2 veces en la comision
        if($profesor1_comision!=$profesor2_comision and $profesor1_comision!=$profesor3_comision and $profesor2_comision!=$profesor3_comision and $profesor1_comision!=$profesor_guia and $profesor2_comision!=$profesor_guia and $profesor3_comision!=$profesor_guia){
        if($request->get('nombre_completo2')!=null){
            $tes->nombre_completo2=$request->get('nombre_completo2');
            DB::table('tesis')->where('id_pk',$id)->update(['nombre_completo2' =>  $tes->nombre_completo2]);
        }
         if($request->get('rut2')!=null){
            $tes->rut2=$request->get('rut2');
            DB::table('tesis')->where('id_pk',$id)->update(['rut2' =>  $tes->rut2]);
        }
         if($request->get('ano_ingreso2')!=null){
            $tes->ano_ingreso2=$request->get('ano_ingreso2');
            DB::table('tesis')->where('id_pk',$id)->update(['ano_ingreso2' =>  $tes->ano_ingreso2]);
        }
         if($request->get('telefono2')!=null){
            $tes->telefono2=$request->get('telefono2');
            DB::table('tesis')->where('id_pk',$id)->update(['telefono2' =>  $tes->telefono2]);
        }
        $tes->nombre_completo=$request->get('nombre_completo');
        DB::table('tesis')->where('id_pk',$id)->update(['nombre_completo' =>  $tes->nombre_completo]);
        $tes->rut=$request->get('rut');
        DB::table('tesis')->where('id_pk',$id)->update(['rut' =>  $tes->rut]);
        $tes->ano_ingreso=$request->get('ano_ingreso');
        DB::table('tesis')->where('id_pk',$id)->update(['ano_ingreso' =>  $tes->ano_ingreso]);
        $tes->telefono1=$request->get('telefono1');
        DB::table('tesis')->where('id_pk',$id)->update(['telefono1' =>  $tes->telefono1]);
        //En caso de que se ingresen los datos del segundo alumno tesista
        
        $tes->profesor_guia=$request->get('profesor_guia');
        DB::table('tesis')->where('id_pk',$id)->update(['profesor_guia' =>  $tes->profesor_guia]);
        $tes->nombre_tesis=$request->get('nombre_tesis');
        DB::table('tesis')->where('id_pk',$id)->update(['nombre_tesis' =>  $tes->nombre_tesis]);
        $tes->area_tesis=$request->get('area_tesis');
        DB::table('tesis')->where('id_pk',$id)->update(['area_tesis' =>  $tes->area_tesis]);
        $tes->carrera=$request->get('carrera');
        DB::table('tesis')->where('id_pk',$id)->update(['carrera' =>  $tes->carrera]);
        $tes->tipo_vinculacion=$request->get('tipo_vinculacion');
        DB::table('tesis')->where('id_pk',$id)->update(['tipo_vinculacion' =>  $tes->tipo_vinculacion]);
        $tes->nombre_vinculacion=$request->get('nombre_vinculacion');
        DB::table('tesis')->where('id_pk',$id)->update(['nombre_vinculacion' =>  $tes->nombre_vinculacion]);
        $tes->tipo=$request->get('tipo');
        DB::table('tesis')->where('id_pk',$id)->update(['tipo' =>  $tes->tipo]);
        $tes->descripcion=$request->get('descripcion');
        DB::table('tesis')->where('id_pk',$id)->update(['descripcion' =>  $tes->descripcion]);
        $tes->objetivos=$request->get('objetivos');
        DB::table('tesis')->where('id_pk',$id)->update(['objetivos' =>  $tes->objetivos]);
        $tes->contribucion=$request->get('contribucion');
        DB::table('tesis')->where('id_pk',$id)->update(['contribucion' =>  $tes->contribucion]);

        //$tes->update();
         //dd($user);
        }else{
            return view('tesis.profesor_repetido_comision');
        }
        //dd($user);
        //$comision=new Comision;
        //$alumno=DB::table('users')->join('tesis','users.name','=',$tes->nombre_completo)->get();
        //dd($alumno);
        //$comision =new Comision;;
        //$comision->id_profesor_guia=$profe->id;
       //dd($id);
       DB::table('comision')->where('id','=', $id)->delete();
       DB::table('comision')->insert([
            'id' => $id,
            'id_profesor_guia' => $profe->id,
            'nombre_alumno' =>$request->nombre_completo,
            'profesor1_comision' => $request->profesor1_comision,
            'coguia' => $request->coguia,
            'profesor2_comision' => $request->profesor2_comision,
            'profesor3_comision' => $request->profesor3_comision,
            'profesor1_externo' => $request->profesor1_externo,
            'profesor1_grado_academico' => $request->profesor1_grado_academico,
            'correo_profe1_externo' => $request->correo_profe1_externo,
            'profe2_externo' => $request->profesor2_externo,
            'profe2_grado_academico' => $request->profe2_grado_academico,
            'institucion1' => $request->institucion1,
            'sexo1'  => $request->sexo1,
            'codigo_postal1'=>$request->codigo_postal1,
            'correo_profe2_externo' => $request->correo_profe2_externo,
            'institucion2' => $request->institucion2,
            'codigo_postal2'=>$request->codigo_postal2,
            'sexo2' => $request->sexo2,
        ]);

       DB::table('capitulos')->where('id','=', $id)->delete();
       if($tes->estado1==2 and $tes->estado2==null){
        $fecha=now();
        //dd($request->cap1);
       DB::table('capitulos')->insert([
            'id' => $id,
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
         }
        //dd($request);
        return view('profesorhome');
    }

     //Se guardan los datos de tesis y de comision insertados por el director de tesis
     public function update5(Request $request,$id)
    {

        //dd($request);
        $request->validate([
            'profesor_guia' => 'required|string',
            'nombre_completo' => 'required|string',
            'rut' => 'required|string|min:11|max:12',
            'ano_ingreso' => 'required|integer',
            'profesor1_comision' => 'required|string',
            'profesor2_comision' => 'required|string',
            'profesor3_comision' =>'string',
        ]);

        //dd($request);

        //dd($id);
        $idlogin=Auth::id();
        $user=User::findorfail($idlogin);
        if($idlogin==null){
            return view('tesis.sinpermiso');
        }
        //dd($id);
        $idlogin=Auth::id();
        $tesis=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesis as $tes);
        $profesor_guia=$request->get('profesor_guia');
        $profesor1_comision=$request->get('profesor1_comision');
        $profesor2_comision=$request->get('profesor2_comision');
        $profesor3_comision=$request->get('profesor3_comision');
        //Para que el profesor no sea seleccionado 2 veces en la comision
        if($profesor1_comision!=$profesor2_comision and $profesor1_comision!=$profesor3_comision and $profesor2_comision!=$profesor3_comision and $profesor1_comision!=$profesor_guia and $profesor2_comision!=$profesor_guia and $profesor3_comision!=$profesor_guia){
        $tes->nombre_completo=$request->get('nombre_completo');
        DB::table('tesis')->where('id_pk', $id)->update(['nombre_completo' => $tes->nombre_completo]);
        $tes->rut=$request->get('rut');
        DB::table('tesis')->where('id_pk', $id)->update(['rut' => $tes->rut]);
        $tes->ano_ingreso=$request->get('ano_ingreso');
        DB::table('tesis')->where('id_pk', $id)->update(['ano_ingreso' => $tes->ano_ingreso]);
        $tes->telefono1=$request->get('telefono1');
        DB::table('tesis')->where('id_pk', $id)->update(['telefono1' => $tes->telefono1]);
        //En caso de que se ingresen los datos del segundo alumno tesista
        if($tes->nombre_completo2!=null)
        {
            $tes->nombre_completo2=$request->get('nombre_completo2');
            DB::table('tesis')->where('id_pk', $id)->update(['nombre_completo2' => $tes->nombre_completo2]);
            $tes->ano_ingreso2=$request->get('ano_ingreso2');
            DB::table('tesis')->where('id_pk', $id)->update(['ano_ingreso2' => $tes->ano_ingreso2]);
            $tes->rut2=$request->get('rut2');
            DB::table('tesis')->where('id_pk', $id)->update(['rut2' => $tes->rut2]);
            $tes->telefono2=$request->get('telefono2');
            DB::table('tesis')->where('id_pk', $id)->update(['telefono2' => $tes->telefono2]);

        }
        $tes->profesor_guia=$request->get('profesor_guia');
        DB::table('tesis')->where('id_pk', $id)->update(['profesor_guia' => $tes->profesor_guia]);
        $id_profesor=DB::table('users')->where('users.name','=',$tes->profesor_guia)->select('id')->get();
        //dd($id_profesor);
        foreach($id_profesor as $id_profe)
        {
            $id_profesor_guia=$id_profe->id;

        }
        //dd($id);
        $tes->nombre_tesis=$request->get('nombre_tesis');
        DB::table('tesis')->where('id_pk', $id)->update(['nombre_tesis' => $tes->nombre_tesis]);
        $tes->area_tesis=$request->get('area_tesis');
        DB::table('tesis')->where('id_pk', $id)->update(['area_tesis' => $tes->area_tesis]);
        $tes->carrera=$request->get('carrera');
        DB::table('tesis')->where('id_pk', $id)->update(['carrera' => $tes->carrera]);
        $tes->tipo_vinculacion=$request->get('tipo_vinculacion');
        DB::table('tesis')->where('id_pk', $id)->update(['tipo_vinculacion' => $tes->tipo_vinculacion]);
        $tes->nombre_vinculacion=$request->get('nombre_vinculacion');
        DB::table('tesis')->where('id_pk', $id)->update(['nombre_vinculacion' => $tes->nombre_vinculacion]);
        $tes->tipo=$request->get('tipo');
        DB::table('tesis')->where('id_pk', $id)->update(['tipo' => $tes->tipo]);
        $tes->descripcion=$request->get('descripcion');
        DB::table('tesis')->where('id_pk', $id)->update(['descripcion' => $tes->descripcion]);
        $tes->objetivos=$request->get('objetivos');
        DB::table('tesis')->where('id_pk', $id)->update(['objetivos' => $tes->objetivos]);
        $tes->contribucion=$request->get('contribucion');
        DB::table('tesis')->where('id_pk', $id)->update(['contribucion' => $tes->contribucion]);
        $tes->observacion=$request->get('observacion');
        DB::table('tesis')->where('id_pk', $id)->update(['observacion' => $tes->observacion]);
        }else{
            return view('tesis.profesor_repetido_comision');
        }
        
        DB::table('comision')->where('id','=', $id)->delete();
      
       DB::table('comision')->insert([
            'id' => $id,
            'id_profesor_guia' => $id_profesor_guia,
            'nombre_alumno' =>$request->nombre_completo,
            'profesor1_comision' => $request->profesor1_comision,
            'coguia' => $request->coguia,
            'profesor2_comision' => $request->profesor2_comision,
            'profesor3_comision' => $request->profesor3_comision,
            'profesor1_externo' => $request->profesor1_externo,
            'profesor1_grado_academico' => $request->profesor1_grado_academico,
            'correo_profe1_externo' => $request->correo_profe1_externo,
            'profe2_externo' => $request->profesor2_externo,
            'profe2_grado_academico' => $request->profe2_grado_academico,
            'institucion1' => $request->institucion1,
            'correo_profe2_externo' => $request->correo_profe2_externo,
            'institucion2' => $request->institucion2,
            'sexo1' => $request->sexo1,
            'sexo2' =>$request->sexo2,
            'codigo_postal1' => $request->codigo_postal1,
            'codigo_postal2' => $request->codigo_postal2,
        ]);


       if($user->tipo_usuario==2){
        return view('profesorhome');
    }

         return view('directorhome');
    }



    //Vista que permite al alumno subir el archivo, en caso de que tenga la tesis inscrita estado1=4, estado2=1.
    public function vista_subir_archivo()
    {
        $id=Auth::id();
        if($id==null){
            return view('tesis.sinpermiso');
        }
        elseif($id!=null)
        {
            $tes=Tesis::find($id);
            if($tes->estado1==4 and $tes->estado2==1 /*and $tes->constancia_ex==null*/){

                    return view('tesis.vista_subir_archivo',compact('tes'));
            }
            else{
                if($tes->fecha_presentacion_tesis >= now()){ //Condicion es necesariaaaa??/
                return view('tesis.vista_subir_archivo',compact('tes'));
            }else{
                return view('tesis.archivosubido');
            }
        }
    }
}

    //Se guarda el archivo subido por el alumno de constancia de examen
    public function update_archivo_ex($id, Request $request)
    {       

        //dd($request);
        //dd($request->abstract);
        $tesista=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesista as $tesis);
        //dd($tesis);
        if($request->hasFile('constancia_ex')){
         $file = $request->file('constancia_ex');
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().'\constancia_ex/', $name);
        DB::table('tesis')->where('id_pk',$id)->update(['constancia_ex' =>  $name]);
        DB::table('tesis')->where('id_pk',$id)->update(['publicar' => $request->publicar]);
        DB::table('tesis')->where('id_pk',$id)->update(['abstract' => $request->abstract]);
        /*$tesis->constancia_ex=$name;
        $tesis->publicar=$request->publicar;
        $tesis->abstract=$request->abstract;
        $tesis->update();*/
        //dd($tes);
        //($request->file('constancia_ex')->store('public'));
                   //almacenar el archivo pdf/doc subido al sistem
        $recopilacion=Recopilacion_inf::find($id);
        //dd($recopilacion);
        if($recopilacion==null){
            $al=DB::table('tesis')->join('users','tesis.id','=','users.id')->where('tesis.id_pk','=',$id)->whereNull('nota_tesis')->get();
            //dd($alumno);
            if($al->isEmpty()){ //Si la consulta anterior es vacia, entonces significa que el alumno que es el segundo alumno relacionado con la tesis, el que subio el archivo y desea completar el documento de recopilacion de inf.
            $al=DB::table('tesis')->join('users','tesis.nombre_completo2','=','users.nombre_completo')->whereNull('nota_tesis')->get();
            }
            $fecha_hoy=Carbon::parse(now());
            //$dia_fecha=$fecha_hoy->day; //obtengo dia
            //$mes_fecha=$fecha_hoy->month; //obtengo mes
            //$year_actual=$fecha_hoy->year; //obtengo año
            $fecha=$fecha_hoy->subYear();
           return view('recopilacion.recopilacion_informacion_titulados',compact('al','fecha'));
        }else{
            return view('alumnohome');
        }
        }else{
            return view('tesis.archivonosepudosubir'); 
        }

        
    }

    //En este update es correspondiente a la evaluacion del profesor, el puede rechazar donde el formulario de tesis volveria al alumno(estado1=1, estado2=null, en caso de acepta se envia al director y se le mostrará a este en sus solicitudes de tesis, y estado1=2 y estado2=1.

    public function update3($id, Request $request)
    {

        //dd($request);
        /*$request->validate([
            'profesor_guia' => 'required|string',
            'nombre_completo' => 'required|string',
            'rut' => 'required|string|min:7|max:8',
            'ano_ingreso' => 'required|integer',
            'profesor1_comision' => 'required|string',
            'profesor2_comision' => 'required|string',
            'profesor3_comision' =>'string',
        ]);*/

        //return 'tamos';
        //dd($request);
        $idlogin=Auth::id();
        //$profe=User::findorfail($idlogin);
        //DB::table('tesis')->where('id','=', $id)->delete();
        $tesis=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesis as $tes);
        /*$tes->nombre_completo=$request->get('nombre_completo');
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
        $tes->contribucion=$request->get('contribucion');*/
        if(($request->get('estado'))=='Enviar a Director'){
        $tes->estado1=2;
         DB::table('tesis')->where('id_pk',$id)->update(['estado1' =>  $tes->estado1]);
        $tes->estado2=1;
         DB::table('tesis')->where('id_pk',$id)->update(['estado2' =>  $tes->estado2]);
         DB::table('tesis')->where('id_pk',$id)->update(['estado3' =>  null]);
   		}elseif(($request->get('estado'))=='Rechazar'){
   		$tes->estado1=1;
         DB::table('tesis')->where('id_pk',$id)->update(['estado1' =>  $tes->estado1]);
        $tes->estado2=null;
         DB::table('tesis')->where('id_pk',$id)->update(['estado2' =>  $tes->estado2]);
         DB::table('tesis')->where('id_pk',$id)->update(['estado3' =>  2]);
   		}
        //$user=User::findorfail($id);
        //$user->name=$tes->nombre_completo;
        //$user->update();

        //$comision=new Comision;
        //$alumno=DB::table('users')->join('tesis','users.name','=',$tes->nombre_completo)->get();
        //dd($alumno);
        //$comision =new Comision;;
        //$comision->id_profesor_guia=$profe->id;
        
        /*DB::table('comision')->where('id','=', $id)->delete();
      
       DB::table('comision')->insert([
            'id' => $id,
            'id_profesor_guia' => $profe->id,
            'nombre_alumno' =>$request->nombre_completo,
            'profesor1_comision' => $request->profesor1_comision,
            'profesor2_comision' => $request->profesor2_comision,
            'profesor3_comision' => $request->profesor3_comision,
            'profesor1_externo' => $request->profesor1_externo,
            'correo_profe1_externo' => $request->correo_profe1_externo,
            'profe2_externo' => $request->profesor2_externo,
            'institucion1' => $request->institucion1,
            'correo_profe2_externo' => $request->correo_profe2_externo,
            'institucion2' => $request->institucion2,
        ]);*/
        return view('profesorhome');
    }

        //Se almacena la evaluacion realizada por el director de tesis si acepta estado1 será =4 y estado2=1, ademas el campo fecha_inscripcion tomará el valor del dia actual,y en caso contrario tomará un estado1=5, y estado2=0, lo  que permitirá que sea editable tanto para el profesor como para el alumno, segun edite primero el documento.
    
    	public function update4(Request $request,$id)
    {

        //dd($request);
        /*$request->validate([
            'profesor_guia' => 'required|string',
            'nombre_completo' => 'required|string',
            'rut' => 'required|string|min:7|max:8',
            'ano_ingreso' => 'required|integer',
            'profesor1_comision' => 'required|string',
            'profesor2_comision' => 'required|string',
            'profesor3_comision' =>'string',
        ]);*/

        //return 'tamos';
        //dd($request);
        $idlogin=Auth::id();
        //$profe=User::findorfail($idlogin);
        //DB::table('tesis')->where('id','=', $id)->delete();
        $tesis=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesis as $tes);
        /*$tes->nombre_completo=$request->get('nombre_completo');
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
        $tes->contribucion=$request->get('contribucion');*/
        if(($request->get('estado'))=='Inscribir'){
        $tes->estado1=4;
        DB::table('tesis')->where('id_pk', $id)->update(['estado1' => $tes->estado1]);
        $tes->estado2=1;
        DB::table('tesis')->where('id_pk', $id)->update(['estado2' => $tes->estado2]);
        $tes->fecha_inscripcion=date('Y-m-d');
        DB::table('tesis')->where('id_pk', $id)->update(['fecha_inscripcion' => $tes->fecha_inscripcion]);
   		}elseif(($request->get('estado'))=='Rechazar inscripcion'){
   		$tes->estado1=5;
        DB::table('tesis')->where('id_pk', $id)->update(['estado1' => $tes->estado1]);
        $tes->estado2=null;
        DB::table('tesis')->where('id_pk', $id)->update(['estado2' => $tes->estado2]);
        DB::table('tesis')->where('id_pk', $id)->update(['estado3' => 1]);
   		}
        //$user=User::findorfail($id);
        //$user->name=$tes->nombre_completo;
        //$user->update();

        //$comision=new Comision;
        //$alumno=DB::table('users')->join('tesis','users.name','=',$tes->nombre_completo)->get();
        //dd($alumno);
        //$comision =new Comision;;
        //$comision->id_profesor_guia=$profe->id;
        
        /*DB::table('comision')->where('id','=', $id)->delete();
      
       DB::table('comision')->insert([
            'id' => $id,
            'id_profesor_guia' => $profe->id,
            'nombre_alumno' =>$request->nombre_completo,
            'profesor1_comision' => $request->profesor1_comision,
            'profesor2_comision' => $request->profesor2_comision,
            'profesor3_comision' => $request->profesor3_comision,
            'profesor1_externo' => $request->profesor1_externo,
            'correo_profe1_externo' => $request->correo_profe1_externo,
            'profe2_externo' => $request->profesor2_externo,
            'institucion1' => $request->institucion1,
            'correo_profe2_externo' => $request->correo_profe2_externo,
            'institucion2' => $request->institucion2,
        ]);*/
        return view('directorhome');
    }

    //La tesis podrá ser borrada siempre y cuando la fecha de presentacion del alumno no haya sido ya definida.
    public function destroy($id)
    {    
        $idlogin=Auth::id();
        $users=DB::table('users')->where('id','=',$idlogin)->get();
        foreach($users as $user);
        $tesis=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesis as $tes);
        if($tes->fecha_presentacion_tesis!=null){
            return view('tesis.sinpermiso');
        }
        DB::table('tesis')->where('id_pk', $id)->delete();
        if($user->tipo_usuario==1){
            return view('alumnohome');
        }
        if($user->tipo_usuario==2 and $user->director_escuela==0){
            return view('profesorhome');
        }
        if($user->tipo_usuario==2 and $user->director_escuela==1){
            return view('director_escuelahome');
        }

        if($user->tipo_usuario==3){ 
            return view('directorhome');
        }
    }


    //Vista para generar informe de tesis relacionadas a empresas, recordar que los valores estado1=4 y estado2=1, son para las tesis inscritas, y posteriormente se verifica que la fecha de inscripcion pertenezca a los rangos de fechas definidos en la vista rango_fechas
    public function printTesis(Request $request){

       $fecha_inicio=$request->fecha_inicio;
       $fecha_final=$request->fecha_final;
       $tes_empresas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Empresa')->whereBetween('fecha_inscripcion',[$fecha_inicio,$fecha_final])->select('tesis.id_pk','tesis.id','tesis.nombre_completo','tesis.nombre_completo2','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion','tesis.nombre_vinculacion')->get();
       //dd($tes->empresas);

		$html = view('tesis.print', ['tes_empresas' => $tes_empresas])->render();

		return $html;
   }
   //Vista para generar informe de tesis relacionadas a proyectos, recordar que los valores estado1=4 y estado2=1, son para las tesis inscritas, y posteriormente se verifica que la fecha de inscripcion pertenezca a los rangos de fechas definidos en la vista rango_fechas

    public function printTesisp(Request $request){

        $fecha_inicio=$request->fecha_inicio;
       $fecha_final=$request->fecha_final;
        $tes_proyectos=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Proyecto')->whereBetween('fecha_inscripcion',[$fecha_inicio,$fecha_final])->select('tesis.id_pk','tesis.id','tesis.nombre_completo','tesis.nombre_completo2','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion','tesis.nombre_vinculacion')->get();

		$html = view('tesis.printTesisp', ['tes_proyectos' => $tes_proyectos])->render();

		return $html;
   }
  // Vista para generar informe de tesis relacionadas a comunidad, recordar que los valores estado1=4 y estado2=1, son para las tesis inscritas, y posteriormente se verifica que la fecha de inscripcion pertenezca a los rangos de fechas definidos en la vista rango_fechas
   public function printTesisc(Request $request){

        $fecha_inicio=$request->fecha_inicio;
       $fecha_final=$request->fecha_final;
    	 $tes_comunidad=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Comunidad')->whereBetween('fecha_inscripcion',[$fecha_inicio,$fecha_final])->select('tesis.id_pk','tesis.id','tesis.nombre_completo','tesis.nombre_completo2','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion','tesis.nombre_vinculacion')->get(); 

		$html = view('tesis.printTesisc', ['tes_comunidad' => $tes_comunidad])->render();

		return $html;
   }
   //Vista para generar informe de tesis relacioandas a fondos concursables, recordar que los valores estado1=4 y estado2=1, son para las tesis inscritas, y posteriormente se verifica que la fecha de inscripcion pertenezca a los rangos de fechas definidos en la vista rango_fechas
   public function printTesisfc(Request $request){

        $fecha_inicio=$request->fecha_inicio;
        $fecha_final=$request->fecha_final;
    	$tes_fondoconcursable=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Fondo concursable')->whereBetween('fecha_inscripcion',[$fecha_inicio,$fecha_final])->select('tesis.id_pk','tesis.id','tesis.nombre_completo','tesis.nombre_completo2','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion','tesis.nombre_vinculacion')->get();  

		$html = view('tesis.printTesisfc', ['tes_fondoconcursable' => $tes_fondoconcursable])->render();

		return $html;
   }

   public function acta_examen($id)
   {
    //dd($id);
    $tesis=DB::table('tesis')->join('comision','tesis.id_pk','=','comision.id')->where('tesis.id_pk',$id)->get();
   

    foreach($tesis as $tes)
    {
        //dd($tes);
        $nombre_alumno1=($tes->nombre_completo);//stropper para colocar en mayuscula el nombre del o los alumnos de la tesis o memoria.
        $nombre_alumno2=($tes->nombre_completo2);
        //para obtener campos necesario de la tupla de la base de datos, el dia, mes, año y la hora, usando carbon
        //paquete de laravel para trabajar con fechas, con mb_stroupper pasa la ñ y a mayuscula.
        $tes->nombre_completo=mb_strtoupper($tes->nombre_completo);
        $tes->nombre_completo2=mb_strtoupper($tes->nombre_completo2);
        $fecha=Carbon::parse($tes->fecha_presentacion_tesis);
        $nombre_dia=$day=date('w', strtotime($fecha)); //w es funcion de php para obtener nombre del dia 0 es domingo y sucesivamente hasta que es el 6 es sabado.
        $dia_fecha=$fecha->day; //obtengo dia
        $mes_fecha=$fecha->month; //obtengo mes
        $year_fecha=$fecha->year; //obtengo año
        $hora_presentacion_tesis=$fecha->format('H:i'); //obtengo hora y minuto de inicio presentacion
    }
    //dd($tes->nombre_completo);
    //dd($tes);
    //consultas para obtener grado academico de los profesores de planta.
    $profesor_guia=DB::table('users')->join('comision','users.id','=','comision.id_profesor_guia')->join('grado_academico_profesor_planta','users.id','=','grado_academico_profesor_planta.id')->where('nombre_alumno','=',$nombre_alumno1)->get();
    $profesor1_com=DB::table('users')->join('comision','users.name','=','comision.profesor1_comision')->join('grado_academico_profesor_planta','users.id','=','grado_academico_profesor_planta.id')->where('nombre_alumno','=',$nombre_alumno1)->get();
    $profesor2_com=DB::table('users')->join('comision','users.name','=','comision.profesor2_comision')->join('grado_academico_profesor_planta','users.id','=','grado_academico_profesor_planta.id')->where('nombre_alumno','=',$nombre_alumno1)->get();
    $profesor3_com=DB::table('users')->join('comision','users.name','=','comision.profesor3_comision')->join('grado_academico_profesor_planta','users.id','=','grado_academico_profesor_planta.id')->where('nombre_alumno','=',$nombre_alumno1)->get();
    $direc_esc=DB::table('users')->join('comision','users.id','=','comision.id_profesor_guia')->join('grado_academico_profesor_planta','users.id','=','grado_academico_profesor_planta.id')->where('director_escuela',1)->get();

    //dd($profesor1_com);
    //Se hace el foreach para entrar al elemento del array, y asi llegar e imprimirlo en la vista;
    foreach($profesor_guia as $profe_guia) $grado_profe_guia=$profe_guia->grado_academico;
    foreach($profesor1_com as $profe1_com) $grado_profe1_com=$profe1_com->grado_academico;
    foreach($profesor2_com as $profe2_com) $grado_profe2_com=$profe2_com->grado_academico;
    foreach($direc_esc as $d_e) $director_escuela=$d_e->name;
    if($profesor3_com->isEmpty()==false){
    foreach($profesor3_com as $profe3_com) $grado_profe3_com=$profe3_com->grado_academico;
    }else{
        $grado_profe3_com="Ninguno";
    }
    $director_escuela = strtoupper($director_escuela); //Para colocar string en mayuscula
    //dd($hora_presentacion_tesis);
    switch($nombre_dia)
    {
        case 1: $nombre_dia="Lunes";
        break;
        case 2: $nombre_dia="Martes";
        break;
        case 3: $nombre_dia="Miercoles";
        break;
        case 4: $nombre_dia="Jueves";
        break;
        case 5: $nombre_dia="Viernes";
        break;
        case 6: $nombre_dia="Sabado";
        break;
    }
    switch($mes_fecha)
    {
     case 1: $mes_fecha="Enero";
     break;
     case 2: $mes_fecha="Febrero";
     break;
     case 3: $mes_fecha="Marzo";
     break;
     case 4:$mes_fecha="Abril";
     break;
     case 5: $mes_Fecha="Mayo";
     break;
     case 6: $mes_fecha="Junio";
     break;
     case 7: $mes_fecha="Julio";
     break;
     case 8: $mes_fecha="Agosto";
     break;
     case 9: $mes_fecha="Septiembre";
     break;
     case 10:$mes_fecha="Octubre";
     break;
     case 11:$mes_fecha="Noviembre";
     break;
     case 12:$mes_fecha="Diciembre";
     break;
    }




    return view('tesis.acta_examen',compact('tesis','dia_fecha','nombre_dia','mes_fecha','year_fecha','hora_presentacion_tesis','grado_profe_guia','grado_profe1_com','grado_profe2_com','grado_profe3_com','director_escuela'));
   }

 
    public function index_al_sec(Request $request)
   {
    if($request->nombre_completo==null){
    $id=Auth::id();
    $user=User::find($id);
    if(!Auth::id() or $user->tipo_usuario!=4){  //Para garantizar que no entre usuario sin loguearse//
        return view('tesis.sinpermiso');
        }else{ //solo secretaria //
            $tesistas=DB::table('tesis')->where('estado1','=',4)->where('estado2','=',1)->paginate(7);
            return view('tesis.index_al_sec',compact('tesistas'));
            //dd($tesistas);
        }
    }else{
        $nombre_completo=$request->nombre_completo;
        $id=Auth::id();
        $user=User::find($id);
        if(!Auth::id() or $user->tipo_usuario!=4){  //Para garantizar que no entre usuario sin loguearse//
        return view('tesis.sinpermiso');
        }else{ //solo secretaria //
            $tesistas=DB::table('tesis')->where('nombre_completo','=',$nombre_completo)->where('estado1','=',4)->where('estado2','=',1)->paginate(7);
            return view('tesis.index_al_sec',compact('tesistas'));
            //dd($tesistas);
        }
      }
    }


     public function index_titulados_sec(Request $request)
   {

    $id=Auth::id();
    $user=User::find($id);
    $tesista=DB::table('tesis')->where('estado1','=',4)->where('estado2','=',1)->where('nota_tesis','>=',4)->select('tesis.id_pk','tesis.id','tesis.nombre_completo','tesis.nombre_completo2','tesis.profesor_guia')->paginate(7);
    //dd($tesista2);
     if(!Auth::id() or $user->tipo_usuario!=4){  //Para garantizar que no entre usuario sin loguearse//
        return view('tesis.sinpermiso');
        }else{ //solo secretaria //
            //$tesistas=DB::table('users')->join('tesis','users.id','=','tesis.id')->where('estado1','=',4)->where('estado2','=',1)->whereNotNull('nota_tesis')->paginate(7);
            //dd($tesistas);
        return view('tesis.index_titulados_sec',compact('tesista'));
    }
    
    }

    public function recopilacion_inf($id)
   {
    //dd($id);
    $users=DB::table('users')->join('tesis','users.id','=','tesis.id')->where('tesis.id_pk',$id)->get();
    foreach($users as $user);
    //dd($user);
    $tesis=DB::table('tesis')->join('recopilacion_inf_titulados','tesis.id_pk','=','recopilacion_inf_titulados.id')->join('users','tesis.id','=','users.id')->where('tesis.id_pk',$id)->where('tesis.id','=',$user->id)->get();
    //dd($tesis);

    
   return view('tesis.recopilacion_inf',compact('tesis'));
   }

     public function recopilacion_inf2($id)
   {

    //$user=User::find($id);
    //dd($id);
    $datos=DB::table('tesis')->where('id_pk',$id)->get();
    foreach($datos as $dato);
    $nombre_completo2=$dato->nombre_completo2;
    //$nombre_completo2=$datos_alumno2->nombre_completo2;
    $tesis=DB::table('tesis')->join('recopilacion_inf_titulados','tesis.id_pk','=','recopilacion_inf_titulados.id')->join('users','tesis.nombre_completo2','=','users.name')->where('users.name',$nombre_completo2)->where('tesis.nombre_completo2','=',$nombre_completo2)->where('tesis.id_pk',$id)->get();
    
   return view('tesis.recopilacion_inf2',compact('tesis'));
   }


   //Una vez que el alumno haya presentado su tesis la secretaria podra insertar la nota de tesis en el sistema
   public function ingresar_nota_tesis($id)
   {
     $tesista=DB::table('tesis')->where('id_pk',$id)->get();
     foreach($tesista as $tesis);
     return view('tesis.ingresar_nota_tesis',compact('tesis'));  

   }

   public function update_nota_tesis($id, Request $request)
   {
        DB::table('tesis')->where('id_pk', $id)->update(['nota_tesis' => $request->nota_tesis]);
        return view('secretariahome');
   } 
        //Una vez que el alumno haya subido su constancia de examen se le redireccionará a la vista para definir su fecha de 
        //inscripcion tesis 
     public function fecha_presentacion($id)
   {
     //dd($id);
     $tesista=DB::table('tesis')->where('id_pk',$id)->get();
     foreach($tesista as $tesis);
    // dd($tesis);
     //dd($tesis->id);
     return view('tesis.fecha_presentacion',compact('tesis'));  

   }

    public function update_fecha_presentacion($id, Request $request)
   {
        //dd($request);
        $tesista=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesista as $tesis);
        //dd($tesis);
        $todas_tesis=DB::table('tesis')->get();
        DB::table('tesis')->where('id_pk', $id)->update(['fecha_presentacion_tesis' => $request->fecha_presentacion_tesis]);
        return view('secretariahome'); 
        //echo gettype($request->fecha_presentacion); 
        /*if(whereTime($request->fecha_presentacion,'=','15:00:00') or (whereTime($request->fecha_presentacion, '=' ,'16:00:00')) or   (whereTime(,$request->fecha_presentacion,'=','17:00:00')) or (whereTime($request->fecha_presentacion,'=','18:00:00')) or  (whereTime($request->fecha_presentacion,'=','19:00:00'))or(whereTime($request->fecha_presentacion,'=','20:00:00')) or (whereTime($request->fecha_presentacion,'=','21:00:00'))) */
        /*$cont=0;
        foreach($todas_tesis as $tesis)
        {
                if($tesis->fecha_presentacion_tesis==$request->fecha_presentacion_tesis)
                     {
                     $cont=$cont+1;
        //dd($tes);
                     }
        }
        if($cont==0){
        $tes->fecha_presentacion_tesis=$request->fecha_presentacion_tesis;
        $tes->update();
        return view('alumnohome');
        }else{
            $tesis=Tesis::find($id);
            return view('tesis.fecha_presentacion',compact('tesis'));  
        }*/
   }
   //Se guarda la fecha seleccionada//

   /*public function update_fecha_presentacion($id, Request $request)
   {
        //dd($request);
        $tes=Tesis::find($id);
        $todas_tesis=DB::table('tesis')->get();
        $tesis=Tesis::find($id);
        $tes->fecha_presentacion_tesis=$request->fecha_presentacion_tesis;
        $tes->update();
            return view('alumnohome'); 
        }*/
        //echo gettype($request->fecha_presentacion); 
        /*if(whereTime($request->fecha_presentacion,'=','15:00:00') or (whereTime($request->fecha_presentacion, '=' ,'16:00:00')) or   (whereTime(,$request->fecha_presentacion,'=','17:00:00')) or (whereTime($request->fecha_presentacion,'=','18:00:00')) or  (whereTime($request->fecha_presentacion,'=','19:00:00'))or(whereTime($request->fecha_presentacion,'=','20:00:00')) or (whereTime($request->fecha_presentacion,'=','21:00:00'))) */
        /*$cont=0;
        foreach($todas_tesis as $tesis)
        {
                if($tesis->fecha_presentacion_tesis==$request->fecha_presentacion_tesis)
                     {
                     $cont=$cont+1;
        //dd($tes);
                     }
        }
        if($cont==0){
        $tes->fecha_presentacion_tesis=$request->fecha_presentacion_tesis;
        $tes->update();
        return view('alumnohome');
        }else{
            $tesis=Tesis::find($id);
            return view('tesis.fecha_presentacion',compact('tesis'));  
        }*/
   

   //En esta vista la secretaria selecciona el acta ya compleetada la presentacion y lo sube.
   public function vista_subir_acta($id)
    {
        if($id==null){
            return view('tesis.sinpermiso');
        }
        elseif($id!=null)
        {
            $tesis=DB::table('tesis')->where('id_pk',$id)->get();
            foreach($tesis as $tes);
            if($tes->estado1==4 and $tes->estado2==1 and $tes->acta_ex==null){
                    return view('tesis.vista_subir_acta',compact('tes'));
            }
            else{
                return view('tesis.archivosubido');
            }
        }

    }

    //Aca se recibe el documento y se almacena en la ruta public/acta.
    public function update_acta_ex($id, Request $request)
    {       

        //dd($request->acta_ex);
        //dd($tes);
        //($request->file('acta_ex')->store('public'));

         $tesis=Tesis::find($id);
        if($request->hasFile('acta_ex')){    //almacenar el archivo pdf/doc subido al sistema
         $file = $request->file('acta_ex');
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().'\acta_ex/', $name);
        $tesis->acta_ex=$name;
        $tesis->update();
        //dd($tes);
        //($request->file('constancia_ex')->store('public'));
                   //almacenar el archivo pdf/doc subido al sistem
           return view('secretariahome');
        }else{
            return view('tesis.archivonosepudosubir');
        }

        /*if($request->hasFile('acta_ex')){          
            $file = $request->file('acta_ex');
            $name = time().$file->getClientOriginalName();
            $file->move('\acta_ex/', $name);
        }
        return view('secretariahome',compact('tesis'));*/
    }

    //Para poder visualizar el pdf de acta del alumno y pdf de constancia examen que sube el alumno se uso el paquete PDFMERGE, que permite habiendo creado una carpeta en este caso en public\acta_ex y public\constancia_ex donde se almacenaran estos documentos que se suban al sistema, y se visualizarán desde estas rutas mas tarde.
        public function verPDF($id){

        //dd($id);
        $tesista = DB::table('tesis')->where('id_pk','=',$id)->get();
        foreach($tesista as $tesis);
        $pathToFile =public_path().'\constancia_ex/'.$tesis->constancia_ex;
        return response()->file($pathToFile);

    }

    public function verPDF_acta($id){

        $tesista = DB::table('tesis')->where('id_pk','=',$id)->get();
        foreach($tesista as $tesis);
        $pathToFile =public_path().'\acta_ex/'.$tesis->acta_ex;
        return response()->file($pathToFile);

    }

    //Vista para hacer consulta en intervalos de tiempo
    public function rango_fechas()
    {

        /*$options = ['Empresas' => 'Tesis relacionadas a empresas', 
                    'Proyecto' => 'Tesis relacionadas a proyectos',
                    'Comunidad'=> 'Tesis relacionadas a comunidad',
                    'Fondoconcursable'=> 'Tesis relacionadas a fondos concursables',
                    'PendientesyProrrogas' =>'Notas Pendientes y de Prorrogas',
                    'Pendientes' => 'Solo notas pendientes',
                    'Prorrogas' => 'Solo notas de prorrogas'
                ];*/
        $id=Auth::id();
        $user=User::find($id);
        if($id==null){
                return view('tesis.sinpermiso');
        }else{
            if($user->tipo_usuario!=3){
                return view('tesis.sinpermiso');
            }else{
                if($user->tipo_usuario==3){
                    return view('tesis.rango_fechas');

                }
            }
        }

    }


    //en caso de error al generar pdf.
    public function error_generar_pdf()
    {
         return view('tesis.error_generar_pdf');   

    }

    //Muestra vista con seleccion de informes recibe fecha_inicio y fecha_fin del formulario rango fechas
    public function informes_rangos_fechas(Request $request)
    {
       
       $fecha_inicio=$request->fecha_inicio;
       $fecha_final=$request->fecha_fin;
       //dd($fecha_inicio);
       //dd($fecha_final);
        $id=Auth::id();
        $user=User::findorfail($id);
        if($id==null or $user->tipo_usuario!=3){
            return('tesis.sinpermiso');
        }else{
            if($user->tipo_usuario==3){
            return view('tesis.informes_generar_pdf',compact('fecha_inicio','fecha_final'));
            }
        }
        return view('tesis.sinpermiso');
         //Pasa los datos de fecha_inicio y fecha_final a la vista que muestra una lista de informes posibles.
    
        

        }

        public function imprimir_pend_venc()
        {
         $notas_pendientes_vencidas=DB::table('tesis')->whereNull('nota_prorroga')->where('nota_pendiente','<',now())->whereNull('fecha_presentacion_tesis')->get(); 

         return view('tesis.pendientes_vencidas',compact('notas_pendientes_vencidas'));
        }

        public function imprimir_pro_venc()
        {
            $notas_prorrogas_vencidas=DB::table('tesis')->whereNotNull('nota_prorroga')->where('nota_prorroga','<',now())->whereNull('fecha_presentacion_tesis')->get();
            return view('tesis.prorrogas_vencidas',compact('notas_prorrogas_vencidas'));
        }

        /*public function imprimir_pend_pro_venc()
        {
            $notas_pend_pro_vencidas= DB::table('tesis')->whereNull('fecha_presentacion_tesis')->whereNotNull('nota_prorroga')->where('nota_prorroga','<',now())->orwhereNull('nota_prorroga')->where('nota_pendiente','<',now())->whereNull('fecha_presentacion_tesis')->get();

            return view('tesis.pend_pro_vencidas',compact('notas_pend_pro_vencidas'));
            
        }*/

     

        public function profe_comision()
        {

            $id=Auth::id();
            $user=User::findorfail($id);
            if($id==null)
            {
                return('tesis.sinpermiso');
            }
            if($user->tipo_usuario==2){
                    $tesistas=DB::table('comision')->where('profesor1_comision','=',$user->name)->orwhere('profesor2_comision','=',$user->name)->orwhere('profesor3_comision','=',$user->name)->join('tesis','comision.id','=','tesis.id')->paginate(7);
                    //dd($tesistas);
                    return view('tesis.tesis_profesor_comision',compact('tesistas','user'));
            }
        }

    //VER SOLICITUDES DE NOTA PENDIENTE DEL PROFESOR SE PREGUNTA SI EL USUARIO QUE INGRESA A ESTA SESION ES O NO PROFESOR, SI ES ENTONCES LO REDIRECCIONA A LA VISTA CON EL RESPECTIVO LISTADO.
      public function index_solicitud_nota_pendiente()
      {
        $id=Auth::id();
        $user=User::findorfail($id);
        //dd($user);
        if($id==null)
        {
            return('tesis.sinpermiso');
        }

        if($user->tipo_usuario==2){
             $tesistas=DB::table('tesis')->where('profesor_guia','=',$user->name)->orderby('fecha_peticion','desc')->whereNull('estado4')->whereNotnull('nota_pendiente')->paginate(7);
        return view('tesis.index_solicitud_nota_pendiente',compact('tesistas','user'));  
        }

      }

        //VER SOLICITUDES DE NOTA PRORROGA DEL PROFESOR SE PREGUNTA SI EL USUARIO QUE INGRESA A ESTA SESION ES O NO PROFESOR, SI ES ENTONCES LO REDIRECCIONA A LA VISTA CON EL RESPECTIVO LISTADO.


        public function index_solicitud_nota_prorroga()
      {
        $id=Auth::id();
        $user=User::findorfail($id);
        if($id==null)
        {
            return('tesis.sinpermiso');
        }if($user->tipo_usuario==2){
            $tesistas=DB::table('tesis')->whereNotNull('nota_pendiente')->whereNotNull('nota_prorroga')->whereNull('estado5')->where('profesor_guia','=',$user->name)->paginate(7);
            //dd($tesistas);
            return view('tesis.index_solicitud_nota_prorroga',compact('tesistas','user'));
        }                

      }



      //Se acepta la nota pendiente o la modifica el mismo profesor
      public function aceptar_nota_pendiente($id)
      {
        $tesistas=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesistas as $tesis);
        //dd($tesis);
        return view('tesis.aceptar_nota_pendiente',compact('tesis'));

      }

      //Se acepta la nota prorroga o la modifica el mismo profesor
       public function aceptar_nota_prorroga($id)
      {
        $tesistas=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesistas as $tesis);
        return view('tesis.aceptar_nota_prorroga',compact('tesis'));

      }


      public function pendiente_update(Request $request,$id)
      {
        $tes=Tesis::findorfail($id);
        $tes->nota_pendiente=$request->nota_pendiente;
        $tes->estado4=1;
        $tes->update();
        $idprofe=Auth::id();
        $users=DB::table('users')->where('id',$idprofe)->get();
        foreach($users as $user);
        $tesistas=DB::table('tesis')->where('profesor_guia','=',$user->name)->whereNotNull('nota_pendiente')->where('estado4','=',null)->paginate(7);
        return view('tesis.index_solicitud_nota_pendiente',compact('tesistas','user'));
      }

      public function prorroga_update(Request $request,$id)
      {
        //dd($request);
        $tes=Tesis::findorfail($id);
        $tes->nota_prorroga=$request->nota_prorroga;
        $tes->estado5=1;
        $tes->update();
         $idprofe=Auth::id();
        $users=DB::table('users')->where('id',$idprofe)->get();
        foreach($users as $user);
        $tesistas=DB::table('tesis')->where('profesor_guia','=',$user->name)->whereNotNull('nota_prorroga')->where('estado5','=',null)->paginate(7);
        return view('tesis.index_solicitud_nota_prorroga',compact('tesistas','user'));

      }

    //crear numero de memo para memoradum de revision de tesis
      public function create_num_memo($id)
      {
        //dd($id);
        $id_usuario=Auth::id();
        $user=User::find($id_usuario);
        $tesista = DB::table('tesis')->where('id_pk','=',$id)->get();
        //dd($tesista);
        foreach($tesista as $tesis);
        //$tesis->nota_tesis==null
        if($user->tipo_usuario==4 or $user->tipo_usuario==3){
            return view('tesis.create_num_memo',compact('tesis'));
        }else{
            return view('tesis.sinpermiso');
        }
      }


      public function lista_profe_comision_revision(Request $request,$id)
      {
        //dd($id);
        //dd($request);
        $numero=$request->get('numero');
        $comision=Comision::find($id);
        //dd($comision);
        //$tesis=Tesis::find($id);
        //$id=$tesis->id;
        $profesor1=$comision->profesor1_comision;
        $profesor2=$comision->profesor2_comision;
        $profesor3=$comision->profesor3_comision;
        $profesor4=$comision->profesor1_externo;
        $profesor5=$comision->profe2_externo;

        return view('tesis.lista_profes_comision_revision',compact('numero','id','profesor1','profesor2','profesor3','profesor4','profesor5'));
      }


      public function memo_revision1(Request $request)
      {
        $id=$request->get('id');
        //dd($id);
         $num_memo=$request->get('numero');
         $comision=Comision::find($id);
         //dd($comision);
         //dd($comision->profesor1_comision);
         $profesor_comision=DB::table('grado_academico_profesor_planta')->join('users','grado_academico_profesor_planta.id','=','users.id')->where('users.name','=',$comision->profesor1_comision)->get();
         //dd($profesor_comision);
         foreach($profesor_comision as $profe_comision);
         //dd($profesor_comision);
         $profe_comision->grado_academico=mb_strtoupper($profe_comision->grado_academico);
         $profe_comision->name=mb_strtoupper($profe_comision->name);
         //$profesor_com=DB::table('users')->where('name','=',$comision_profesor)->get();
         //dd($comision);
         //$grado_director_tesis=
         //dd($num_memo);
         $tesista = DB::table('tesis')->where('id_pk','=',$id)->get();
         //dd($tesista);
        foreach($tesista as $tesis);
        //dd($tesis);
         $revision=Memorandum::find(1);
         $coordinador_tesis=DB::table('users')->where('tipo_usuario','=',3)->get();
         $fecha=now();

        $year=$fecha->year;
        $dia_fecha=$fecha->day; //obtengo dia
        $mes_fecha=$fecha->month;



         switch($mes_fecha)
    {
     case 1: $mes_fecha="Enero";
     break;
     case 2: $mes_fecha="Febrero";
     break;
     case 3: $mes_fecha="Marzo";
     break;
     case 4:$mes_fecha="Abril";
     break;
     case 5: $mes_Fecha="Mayo";
     break;
     case 6: $mes_fecha="Junio";
     break;
     case 7: $mes_fecha="Julio";
     break;
     case 8: $mes_fecha="Agosto";
     break;
     case 9: $mes_fecha="Septiembre";
     break;
     case 10:$mes_fecha="Octubre";
     break;
     case 11:$mes_fecha="Noviembre";
     break;
     case 12:$mes_fecha="Diciembre";
     break;
    }
    
     //dd($year);
         //dd($coordinador_tesis);
         foreach($coordinador_tesis as $coordinador)
        {  
           $id_coordinador=$coordinador->id; 
           $nombre_coordinador=$coordinador->name; 
        }
         $grado_director_tesis=Grado_academico::find($id_coordinador);
         $grado_director_tesis->grado_academico=mb_strtoupper($grado_director_tesis->grado_academico);
    $profesor_guia=DB::table('users')->where('name','=',$tesis->profesor_guia)->get();
    $j=0;
    $iniciales_coordinador=array();
    for($i=0;$i<strlen($nombre_coordinador);$i++)
        {
            if(($nombre_coordinador[$i]=="A" or $nombre_coordinador[$i]=="B" or $nombre_coordinador[$i]=="C" or $nombre_coordinador[$i]=="D" or $nombre_coordinador[$i]=="E" or $nombre_coordinador[$i]=="F" or $nombre_coordinador[$i]=="G" or $nombre_coordinador[$i]=="H" or $nombre_coordinador[$i]=="I" or $nombre_coordinador[$i]=="J" or $nombre_coordinador[$i]=="K" or $nombre_coordinador[$i]=="L" or $nombre_coordinador[$i]=="M" or $nombre_coordinador[$i]=="N" or $nombre_coordinador[$i]=="Ñ" or $nombre_coordinador[$i]=="O" or$nombre_coordinador[$i]=="P" or $nombre_coordinador[$i]=="Q" or $nombre_coordinador[$i]=="R" or $nombre_coordinador[$i]=="S" or $nombre_coordinador[$i]=="T" or $nombre_coordinador[$i]=="V" or $nombre_coordinador[$i]=="W" or $nombre_coordinador[$i]=="U" or $nombre_coordinador[$i]=="X" or $nombre_coordinador[$i]=="Y" or $nombre_coordinador[$i]=="Z"))
        {
              array_push($iniciales_coordinador,$nombre_coordinador[$i]);
        }
    }
     $j=0;
     $secretaria=DB::table('users')->where('tipo_usuario','=',4)->first();
     //dd($secretaria->name);
     $nombre_secretaria=$secretaria->name;
    $iniciales_secretaria=array();
    for($i=0;$i<strlen($nombre_secretaria);$i++)
        {
            if(($nombre_secretaria[$i]=="A" or $nombre_secretaria[$i]=="B" or $nombre_secretaria[$i]=="C" or $nombre_secretaria[$i]=="D" or $nombre_secretaria[$i]=="E" or $nombre_secretaria[$i]=="F" or $nombre_secretaria[$i]=="G" or $nombre_secretaria[$i]=="H" or $nombre_secretaria[$i]=="I" or $nombre_secretaria[$i]=="J" or $nombre_secretaria[$i]=="K" or $nombre_secretaria[$i]=="L" or $nombre_secretaria[$i]=="M" or $nombre_secretaria[$i]=="N" or $nombre_secretaria[$i]=="Ñ" or $nombre_secretaria[$i]=="O" or$nombre_secretaria[$i]=="P" or $nombre_secretaria[$i]=="Q" or $nombre_secretaria[$i]=="R" or $nombre_secretaria[$i]=="S" or $nombre_secretaria[$i]=="T" or $nombre_secretaria[$i]=="V" or $nombre_secretaria[$i]=="W" or $nombre_secretaria[$i]=="U" or $nombre_secretaria[$i]=="X" or $nombre_secretaria[$i]=="Y" or $nombre_secretaria[$i]=="Z"))
        {
              array_push($iniciales_secretaria,strtolower($nombre_secretaria[$i]));
        }
    }
    //dd($iniciales_coordinador);

    foreach($profesor_guia as $profe)
    {   
        $id_profesor_guia=$profe->id;
        $profesor_guia_nombre=$profe->name;
        $sexo_profe_guia=$profe->sexo;
    }
    $nombre_coordinador=mb_strtoupper($nombre_coordinador);
    //dd($nombre_coordinador);
    $profesor_guia=Grado_academico::find($id_profesor_guia);
    $alumno1=DB::table('users')->where('name','=',$tesis->nombre_completo)->get();
    $alumno2=DB::table('users')->where('name','=',$tesis->nombre_completo2)->get();
    //dd($alumno1);
    $sexo1=null;
    $sexo2=null;
    $tesis->nombre_tesis=mb_strtoupper($tesis->nombre_tesis);
    //dd($tesis->nombre_tesis);
    foreach($alumno1 as $al){
        $sexo1=$al->sexo;
    }
    
   
            foreach($alumno2 as $al2)
            {
                $sexo2=$al2->sexo;
            }
        $i=0;
        $j=0;
        //$fecha=date("2019-10-12");
        while($i<15){              //Con ciclo while se cuentan los 15 dias solo para los habiles con i, y con j todos los dias.
           $date=date('w', strtotime($fecha));
           if($date=="6" or $date=="0"){
            $j=$j+1;
            }elseif($date=="1" or $date=="2" or $date=="3" or $date=="4" or $date=="5"){
             $i=$i+1;
             $j=$j+1;  
            //dd($date);
            }
            $fecha=$fecha->addDay();
        }
        //dd(date('w', strtotime($fecha)));
        //dd("6");
        //dd($j);
        $fecha=now()->addDays($j);
        if((date('w', strtotime($fecha)))=="6")
        {
          $fecha=now()->addDays($j+2);  
        }
        //dd($fecha);
       
        //dd($nombre_coordinador);
         //dd($coordinador_tesis);
         $revision->nombre_memorandum=mb_strtoupper($revision->nombre_memorandum);
        $revision->escuela1=mb_strtoupper($revision->escuela);
         return view('memorandum.memorandum_revision1',compact('tesis','comision','revision','num_memo','nombre_coordinador','year','dia_fecha','mes_fecha','sexo1','sexo2','fecha','profesor_guia','sexo_profe_guia','grado_director_tesis','coordinador','iniciales_coordinador','iniciales_secretaria','profe_comision'));
        
      }
        


        public function memo_revision2(Request $request)
      {
         //dd($request);
        $id=$request->get('id');
        //dd($id);
         $num_memo=$request->get('numero');
         $comision=Comision::find($id);
         $comision->profesor=mb_strtoupper($comision->profesor2_comision);
         $profesor_comision=DB::table('grado_academico_profesor_planta')->join('users','grado_academico_profesor_planta.id','=','users.id')->where('users.name','=',$comision->profesor)->get();
         foreach($profesor_comision as $profe_comision);
         $profe_comision->grado_academico=mb_strtoupper($profe_comision->grado_academico);
         $profe_comision->name=mb_strtoupper($profe_comision->name);
         //$profesor_com=DB::table('users')->where('name','=',$comision_profesor)->get();
         //dd($comision);
         //$grado_director_tesis=
         //dd($num_memo);
        $tesista = DB::table('tesis')->where('id_pk','=',$id)->get();
        foreach($tesista as $tesis);
         $revision=Memorandum::find(1);
         $coordinador_tesis=DB::table('users')->where('tipo_usuario','=',3)->get();
         $fecha=now();

        $year=$fecha->year;
        $dia_fecha=$fecha->day; //obtengo dia
        $mes_fecha=$fecha->month;



         switch($mes_fecha)
    {
     case 1: $mes_fecha="Enero";
     break;
     case 2: $mes_fecha="Febrero";
     break;
     case 3: $mes_fecha="Marzo";
     break;
     case 4:$mes_fecha="Abril";
     break;
     case 5: $mes_Fecha="Mayo";
     break;
     case 6: $mes_fecha="Junio";
     break;
     case 7: $mes_fecha="Julio";
     break;
     case 8: $mes_fecha="Agosto";
     break;
     case 9: $mes_fecha="Septiembre";
     break;
     case 10:$mes_fecha="Octubre";
     break;
     case 11:$mes_fecha="Noviembre";
     break;
     case 12:$mes_fecha="Diciembre";
     break;
    }
    
     //dd($year);
         //dd($coordinador_tesis);
         foreach($coordinador_tesis as $coordinador)
        {  
           $id_coordinador=$coordinador->id; 
           $nombre_coordinador=$coordinador->name; 
        }
         $grado_director_tesis=Grado_academico::find($id_coordinador);
         $grado_director_tesis->grado_academico=mb_strtoupper($grado_director_tesis->grado_academico);
    $profesor_guia=DB::table('users')->where('name','=',$tesis->profesor_guia)->get();
    $j=0;
    $iniciales_coordinador=array();
    for($i=0;$i<strlen($nombre_coordinador);$i++)
        {
            if(($nombre_coordinador[$i]=="A" or $nombre_coordinador[$i]=="B" or $nombre_coordinador[$i]=="C" or $nombre_coordinador[$i]=="D" or $nombre_coordinador[$i]=="E" or $nombre_coordinador[$i]=="F" or $nombre_coordinador[$i]=="G" or $nombre_coordinador[$i]=="H" or $nombre_coordinador[$i]=="I" or $nombre_coordinador[$i]=="J" or $nombre_coordinador[$i]=="K" or $nombre_coordinador[$i]=="L" or $nombre_coordinador[$i]=="M" or $nombre_coordinador[$i]=="N" or $nombre_coordinador[$i]=="Ñ" or $nombre_coordinador[$i]=="O" or$nombre_coordinador[$i]=="P" or $nombre_coordinador[$i]=="Q" or $nombre_coordinador[$i]=="R" or $nombre_coordinador[$i]=="S" or $nombre_coordinador[$i]=="T" or $nombre_coordinador[$i]=="V" or $nombre_coordinador[$i]=="W" or $nombre_coordinador[$i]=="U" or $nombre_coordinador[$i]=="X" or $nombre_coordinador[$i]=="Y" or $nombre_coordinador[$i]=="Z"))
        {
              array_push($iniciales_coordinador,$nombre_coordinador[$i]);
        }
    }
     $secretaria=DB::table('users')->where('tipo_usuario','=',4)->first();
     //dd($secretaria->name);
     $nombre_secretaria=$secretaria->name;
    $iniciales_secretaria=array();
    for($i=0;$i<strlen($nombre_secretaria);$i++)
        {
            if(($nombre_secretaria[$i]=="A" or $nombre_secretaria[$i]=="B" or $nombre_secretaria[$i]=="C" or $nombre_secretaria[$i]=="D" or $nombre_secretaria[$i]=="E" or $nombre_secretaria[$i]=="F" or $nombre_secretaria[$i]=="G" or $nombre_secretaria[$i]=="H" or $nombre_secretaria[$i]=="I" or $nombre_secretaria[$i]=="J" or $nombre_secretaria[$i]=="K" or $nombre_secretaria[$i]=="L" or $nombre_secretaria[$i]=="M" or $nombre_secretaria[$i]=="N" or $nombre_secretaria[$i]=="Ñ" or $nombre_secretaria[$i]=="O" or$nombre_secretaria[$i]=="P" or $nombre_secretaria[$i]=="Q" or $nombre_secretaria[$i]=="R" or $nombre_secretaria[$i]=="S" or $nombre_secretaria[$i]=="T" or $nombre_secretaria[$i]=="V" or $nombre_secretaria[$i]=="W" or $nombre_secretaria[$i]=="U" or $nombre_secretaria[$i]=="X" or $nombre_secretaria[$i]=="Y" or $nombre_secretaria[$i]=="Z"))
        {
              array_push($iniciales_secretaria,strtolower($nombre_secretaria[$i]));
        }
    }
    //dd($iniciales_coordinador);

    foreach($profesor_guia as $profe)
    {   
        $id_profesor_guia=$profe->id;
        $profesor_guia_nombre=$profe->name;
        $sexo_profe_guia=$profe->sexo;
    }
    $nombre_coordinador=mb_strtoupper($nombre_coordinador);
    $profesor_guia=Grado_academico::find($id_profesor_guia);
    $alumno1=DB::table('users')->where('name','=',$tesis->nombre_completo)->get();
    $alumno2=DB::table('users')->where('name','=',$tesis->nombre_completo2)->get();
    //dd($alumno1);
    $sexo1=null;
    $sexo2=null;
    $tesis->nombre_tesis=mb_strtoupper($tesis->nombre_tesis);
    //dd($tesis->nombre_tesis);
    foreach($alumno1 as $al){
        $sexo1=$al->sexo;
    }
    
   
            foreach($alumno2 as $al2)
            {
                $sexo2=$al2->sexo;
            }
        $i=0;
        $j=0;
        //$fecha=date("2019-10-12");
        while($i<15){              //Con ciclo while se cuentan los 15 dias solo para los habiles con i, y con j todos los dias.
           $date=date('w', strtotime($fecha));
           if($date=="6" or $date=="0"){
            $j=$j+1;
            }elseif($date=="1" or $date=="2" or $date=="3" or $date=="4" or $date=="5"){
             $i=$i+1;
             $j=$j+1;  
            //dd($date);
            }
            $fecha=$fecha->addDay();
        }
        //dd(date('w', strtotime($fecha)));
        //dd("6");
        //dd($j);
        $fecha=now()->addDays($j);
        if((date('w', strtotime($fecha)))=="6")
        {
          $fecha=now()->addDays($j+2);  
        }
        //dd($fecha);
       
        //dd($nombre_coordinador);
         //dd($coordinador_tesis);
         $revision->nombre_memorandum=mb_strtoupper($revision->nombre_memorandum);
        $revision->escuela1=mb_strtoupper($revision->escuela);
         return view('memorandum.memorandum_revision2',compact('tesis','comision','revision','num_memo','nombre_coordinador','year','dia_fecha','mes_fecha','sexo1','sexo2','fecha','profesor_guia','sexo_profe_guia','grado_director_tesis','coordinador','iniciales_coordinador','iniciales_secretaria','profe_comision'));
      }


 public function memo_revision3(Request $request)
      {
         //dd($request);
        $id=$request->get('id');
        //dd($id);
         $num_memo=$request->get('numero');
         $comision=Comision::find($id);
         $comision->profesor=mb_strtoupper($comision->profesor3_comision);
         $profesor_comision=DB::table('grado_academico_profesor_planta')->join('users','grado_academico_profesor_planta.id','=','users.id')->where('users.name','=',$comision->profesor)->get();
         foreach($profesor_comision as $profe_comision);
         $profe_comision->grado_academico=mb_strtoupper($profe_comision->grado_academico);
         $profe_comision->name=mb_strtoupper($profe_comision->name);
         //$profesor_com=DB::table('users')->where('name','=',$comision_profesor)->get();
         //dd($comision);
         //$grado_director_tesis=
         //dd($num_memo);
        $tesista = DB::table('tesis')->where('id_pk','=',$id)->get();
        foreach($tesista as $tesis);
         $revision=Memorandum::find(1);
         $coordinador_tesis=DB::table('users')->where('tipo_usuario','=',3)->get();
         $fecha=now();

        $year=$fecha->year;
        $dia_fecha=$fecha->day; //obtengo dia
        $mes_fecha=$fecha->month;



         switch($mes_fecha)
    {
     case 1: $mes_fecha="Enero";
     break;
     case 2: $mes_fecha="Febrero";
     break;
     case 3: $mes_fecha="Marzo";
     break;
     case 4:$mes_fecha="Abril";
     break;
     case 5: $mes_Fecha="Mayo";
     break;
     case 6: $mes_fecha="Junio";
     break;
     case 7: $mes_fecha="Julio";
     break;
     case 8: $mes_fecha="Agosto";
     break;
     case 9: $mes_fecha="Septiembre";
     break;
     case 10:$mes_fecha="Octubre";
     break;
     case 11:$mes_fecha="Noviembre";
     break;
     case 12:$mes_fecha="Diciembre";
     break;
    }
    
     //dd($year);
         //dd($coordinador_tesis);
         foreach($coordinador_tesis as $coordinador)
        {  
           $id_coordinador=$coordinador->id; 
           $nombre_coordinador=$coordinador->name; 
        }
         $grado_director_tesis=Grado_academico::find($id_coordinador);
         $grado_director_tesis->grado_academico=mb_strtoupper($grado_director_tesis->grado_academico);
    $profesor_guia=DB::table('users')->where('name','=',$tesis->profesor_guia)->get();
    $j=0;
    $iniciales_coordinador=array();
    for($i=0;$i<strlen($nombre_coordinador);$i++)
        {
            if(($nombre_coordinador[$i]=="A" or $nombre_coordinador[$i]=="B" or $nombre_coordinador[$i]=="C" or $nombre_coordinador[$i]=="D" or $nombre_coordinador[$i]=="E" or $nombre_coordinador[$i]=="F" or $nombre_coordinador[$i]=="G" or $nombre_coordinador[$i]=="H" or $nombre_coordinador[$i]=="I" or $nombre_coordinador[$i]=="J" or $nombre_coordinador[$i]=="K" or $nombre_coordinador[$i]=="L" or $nombre_coordinador[$i]=="M" or $nombre_coordinador[$i]=="N" or $nombre_coordinador[$i]=="Ñ" or $nombre_coordinador[$i]=="O" or$nombre_coordinador[$i]=="P" or $nombre_coordinador[$i]=="Q" or $nombre_coordinador[$i]=="R" or $nombre_coordinador[$i]=="S" or $nombre_coordinador[$i]=="T" or $nombre_coordinador[$i]=="V" or $nombre_coordinador[$i]=="W" or $nombre_coordinador[$i]=="U" or $nombre_coordinador[$i]=="X" or $nombre_coordinador[$i]=="Y" or $nombre_coordinador[$i]=="Z"))
        {
              array_push($iniciales_coordinador,$nombre_coordinador[$i]);
        }
    }
     $secretaria=DB::table('users')->where('tipo_usuario','=',4)->first();
     //dd($secretaria->name);
     $nombre_secretaria=$secretaria->name;
    $iniciales_secretaria=array();
    for($i=0;$i<strlen($nombre_secretaria);$i++)
        {
            if(($nombre_secretaria[$i]=="A" or $nombre_secretaria[$i]=="B" or $nombre_secretaria[$i]=="C" or $nombre_secretaria[$i]=="D" or $nombre_secretaria[$i]=="E" or $nombre_secretaria[$i]=="F" or $nombre_secretaria[$i]=="G" or $nombre_secretaria[$i]=="H" or $nombre_secretaria[$i]=="I" or $nombre_secretaria[$i]=="J" or $nombre_secretaria[$i]=="K" or $nombre_secretaria[$i]=="L" or $nombre_secretaria[$i]=="M" or $nombre_secretaria[$i]=="N" or $nombre_secretaria[$i]=="Ñ" or $nombre_secretaria[$i]=="O" or$nombre_secretaria[$i]=="P" or $nombre_secretaria[$i]=="Q" or $nombre_secretaria[$i]=="R" or $nombre_secretaria[$i]=="S" or $nombre_secretaria[$i]=="T" or $nombre_secretaria[$i]=="V" or $nombre_secretaria[$i]=="W" or $nombre_secretaria[$i]=="U" or $nombre_secretaria[$i]=="X" or $nombre_secretaria[$i]=="Y" or $nombre_secretaria[$i]=="Z"))
        {
              array_push($iniciales_secretaria,strtolower($nombre_secretaria[$i]));
        }
    }
    //dd($iniciales_coordinador);

    foreach($profesor_guia as $profe)
    {   
        $id_profesor_guia=$profe->id;
        $profesor_guia_nombre=$profe->name;
        $sexo_profe_guia=$profe->sexo;
    }
    $nombre_coordinador=mb_strtoupper($nombre_coordinador);
    $profesor_guia=Grado_academico::find($id_profesor_guia);
    $alumno1=DB::table('users')->where('name','=',$tesis->nombre_completo)->get();
    $alumno2=DB::table('users')->where('name','=',$tesis->nombre_completo2)->get();
    //dd($alumno1);
    $sexo1=null;
    $sexo2=null;
    $tesis->nombre_tesis=mb_strtoupper($tesis->nombre_tesis);
    //dd($tesis->nombre_tesis);
    foreach($alumno1 as $al){
        $sexo1=$al->sexo;
    }
    
   
            foreach($alumno2 as $al2)
            {
                $sexo2=$al2->sexo;
            }
        $i=0;
        $j=0;
        //$fecha=date("2019-10-12");
        while($i<15){              //Con ciclo while se cuentan los 15 dias solo para los habiles con i, y con j todos los dias.
           $date=date('w', strtotime($fecha));
           if($date=="6" or $date=="0"){
            $j=$j+1;
            }elseif($date=="1" or $date=="2" or $date=="3" or $date=="4" or $date=="5"){
             $i=$i+1;
             $j=$j+1;  
            //dd($date);
            }
            $fecha=$fecha->addDay();
        }
        //dd(date('w', strtotime($fecha)));
        //dd("6");
        //dd($j);
        $fecha=now()->addDays($j);
        if((date('w', strtotime($fecha)))=="6")
        {
          $fecha=now()->addDays($j+2);  
        }
        //dd($fecha);
       
        //dd($nombre_coordinador);
         //dd($coordinador_tesis);
         $revision->nombre_memorandum=mb_strtoupper($revision->nombre_memorandum);
        $revision->escuela1=mb_strtoupper($revision->escuela);
         return view('memorandum.memorandum_revision3',compact('tesis','comision','revision','num_memo','nombre_coordinador','year','dia_fecha','mes_fecha','sexo1','sexo2','fecha','profesor_guia','sexo_profe_guia','grado_director_tesis','coordinador','iniciales_coordinador','iniciales_secretaria','profe_comision'));
      }


    public function memo_revision4(Request $request)
      {
        //dd($request);
        $id=$request->get('id');
        //dd($id);
         $num_memo=$request->get('numero');
         $comision=Comision::find($id);
         $comision->profesor1_externo=mb_strtoupper($comision->profesor1_externo);
         $comision->profesor1_grado_academico=mb_strtoupper($comision->profesor1_grado_academico);
         //$profesor_com=DB::table('users')->where('name','=',$comision_profesor)->get();
         //dd($comision);
         //$grado_director_tesis=
         //dd($num_memo);
        $tesista = DB::table('tesis')->where('id_pk','=',$id)->get();
        foreach($tesista as $tesis);
         //dd($tesis);
         $revision=Memorandum::find(1);
         $coordinador_tesis=DB::table('users')->where('tipo_usuario','=',3)->get();
         $fecha=now();

        $year=$fecha->year;
        $dia_fecha=$fecha->day; //obtengo dia
        $mes_fecha=$fecha->month;



         switch($mes_fecha)
    {
     case 1: $mes_fecha="Enero";
     break;
     case 2: $mes_fecha="Febrero";
     break;
     case 3: $mes_fecha="Marzo";
     break;
     case 4:$mes_fecha="Abril";
     break;
     case 5: $mes_Fecha="Mayo";
     break;
     case 6: $mes_fecha="Junio";
     break;
     case 7: $mes_fecha="Julio";
     break;
     case 8: $mes_fecha="Agosto";
     break;
     case 9: $mes_fecha="Septiembre";
     break;
     case 10:$mes_fecha="Octubre";
     break;
     case 11:$mes_fecha="Noviembre";
     break;
     case 12:$mes_fecha="Diciembre";
     break;
    }
    
     //dd($year);
         //dd($coordinador_tesis);
         foreach($coordinador_tesis as $coordinador)
        {  
           $id_coordinador=$coordinador->id; 
           $nombre_coordinador=$coordinador->name; 
        }
         $grado_director_tesis=Grado_academico::find($id_coordinador);
         $grado_director_tesis->grado_academico=mb_strtoupper($grado_director_tesis->grado_academico);
    $profesor_guia=DB::table('users')->where('name','=',$tesis->profesor_guia)->get();
    $j=0;
    $iniciales_coordinador=array();
    for($i=0;$i<strlen($nombre_coordinador);$i++)
        {
            if(($nombre_coordinador[$i]=="A" or $nombre_coordinador[$i]=="B" or $nombre_coordinador[$i]=="C" or $nombre_coordinador[$i]=="D" or $nombre_coordinador[$i]=="E" or $nombre_coordinador[$i]=="F" or $nombre_coordinador[$i]=="G" or $nombre_coordinador[$i]=="H" or $nombre_coordinador[$i]=="I" or $nombre_coordinador[$i]=="J" or $nombre_coordinador[$i]=="K" or $nombre_coordinador[$i]=="L" or $nombre_coordinador[$i]=="M" or $nombre_coordinador[$i]=="N" or $nombre_coordinador[$i]=="Ñ" or $nombre_coordinador[$i]=="O" or$nombre_coordinador[$i]=="P" or $nombre_coordinador[$i]=="Q" or $nombre_coordinador[$i]=="R" or $nombre_coordinador[$i]=="S" or $nombre_coordinador[$i]=="T" or $nombre_coordinador[$i]=="V" or $nombre_coordinador[$i]=="W" or $nombre_coordinador[$i]=="U" or $nombre_coordinador[$i]=="X" or $nombre_coordinador[$i]=="Y" or $nombre_coordinador[$i]=="Z"))
        {
              array_push($iniciales_coordinador,$nombre_coordinador[$i]);
        }
    }

     $secretaria=DB::table('users')->where('tipo_usuario','=',4)->first();
     //dd($secretaria->name);
     $nombre_secretaria=$secretaria->name;
    $iniciales_secretaria=array();
    for($i=0;$i<strlen($nombre_secretaria);$i++)
        {
            if(($nombre_secretaria[$i]=="A" or $nombre_secretaria[$i]=="B" or $nombre_secretaria[$i]=="C" or $nombre_secretaria[$i]=="D" or $nombre_secretaria[$i]=="E" or $nombre_secretaria[$i]=="F" or $nombre_secretaria[$i]=="G" or $nombre_secretaria[$i]=="H" or $nombre_secretaria[$i]=="I" or $nombre_secretaria[$i]=="J" or $nombre_secretaria[$i]=="K" or $nombre_secretaria[$i]=="L" or $nombre_secretaria[$i]=="M" or $nombre_secretaria[$i]=="N" or $nombre_secretaria[$i]=="Ñ" or $nombre_secretaria[$i]=="O" or$nombre_secretaria[$i]=="P" or $nombre_secretaria[$i]=="Q" or $nombre_secretaria[$i]=="R" or $nombre_secretaria[$i]=="S" or $nombre_secretaria[$i]=="T" or $nombre_secretaria[$i]=="V" or $nombre_secretaria[$i]=="W" or $nombre_secretaria[$i]=="U" or $nombre_secretaria[$i]=="X" or $nombre_secretaria[$i]=="Y" or $nombre_secretaria[$i]=="Z"))
        {
              array_push($iniciales_secretaria,strtolower($nombre_secretaria[$i]));
        }
    }
    //dd($iniciales_coordinador);

    foreach($profesor_guia as $profe)
    {   
        $id_profesor_guia=$profe->id;
        $profesor_guia_nombre=$profe->name;
        $sexo_profe_guia=$profe->sexo;
    }
    $nombre_coordinador=mb_strtoupper($nombre_coordinador);
    $profesor_guia=Grado_academico::find($id_profesor_guia);
    $alumno1=DB::table('users')->where('name','=',$tesis->nombre_completo)->get();
    $alumno2=DB::table('users')->where('name','=',$tesis->nombre_completo2)->get();
    //dd($alumno1);
    $sexo1=null;
    $sexo2=null;
    $tesis->nombre_tesis=mb_strtoupper($tesis->nombre_tesis);
    //dd($tesis->nombre_tesis);
    foreach($alumno1 as $al){
        $sexo1=$al->sexo;
    }
    
   
            foreach($alumno2 as $al2)
            {
                $sexo2=$al2->sexo;
            }
        $i=0;
        $j=0;
        while($i<15){              //Con ciclo while se cuentan los 15 dias solo para los habiles con i, y con j todos los dias.
           $date=date('w', strtotime($fecha));
           if($date=="6" or $date=="0"){
            $j=$j+1;
            }elseif($date=="1" or $date=="2" or $date=="3" or $date=="4" or $date=="5"){
             $i=$i+1;
             $j=$j+1;  
            //dd($date);
            }
            $fecha=$fecha->addDay();
        }
        //dd(date('w', strtotime($fecha)));
        //dd("6");
        //dd($j);
        $fecha=now()->addDays($j);
        if((date('w', strtotime($fecha)))=="6")
        {
          $fecha=now()->addDays($j+2);  
        }
        //dd($fecha);
       
        //dd($nombre_coordinador);
        //dd($coordinador_tesis);
         $revision->nombre_memorandum=mb_strtoupper($revision->nombre_memorandum);
        $revision->escuela1=mb_strtoupper($revision->escuela);
         return view('memorandum.memorandum_revision4',compact('tesis','comision','revision','num_memo','nombre_coordinador','year','dia_fecha','mes_fecha','sexo1','sexo2','fecha','profesor_guia','sexo_profe_guia','grado_director_tesis','coordinador','iniciales_coordinador','iniciales_secretaria'));
      }


      public function memo_revision5(Request $request)
      {
        //dd($request);
        $id=$request->get('id');
        //dd($id);
         $num_memo=$request->get('numero');
         $comision=Comision::find($id);
         $comision->profe2_grado_academico=mb_strtoupper($comision->profe2_grado_academico);
         $comision->profe2_externo=mb_strtoupper($comision->profe2_externo);
         //$comision->profesor1_externo=mb_strtoupper($comision->profesor1_externo);
         //$comision->profesor1_grado_academico=mb_strtoupper($profesor1_grado_academico);
         //$profesor_com=DB::table('users')->where('name','=',$comision_profesor)->get();
         //dd($comision);
         //$grado_director_tesis=
         //dd($num_memo);
         $tesista = DB::table('tesis')->where('id_pk','=',$id)->get();
         foreach($tesista as $tesis);
         //dd($tesis);
         $revision=Memorandum::find(1);
         $coordinador_tesis=DB::table('users')->where('tipo_usuario','=',3)->get();
         $fecha=now();

        $year=$fecha->year;
        $dia_fecha=$fecha->day; //obtengo dia
        $mes_fecha=$fecha->month;



         switch($mes_fecha)
    {
     case 1: $mes_fecha="Enero";
     break;
     case 2: $mes_fecha="Febrero";
     break;
     case 3: $mes_fecha="Marzo";
     break;
     case 4:$mes_fecha="Abril";
     break;
     case 5: $mes_Fecha="Mayo";
     break;
     case 6: $mes_fecha="Junio";
     break;
     case 7: $mes_fecha="Julio";
     break;
     case 8: $mes_fecha="Agosto";
     break;
     case 9: $mes_fecha="Septiembre";
     break;
     case 10:$mes_fecha="Octubre";
     break;
     case 11:$mes_fecha="Noviembre";
     break;
     case 12:$mes_fecha="Diciembre";
     break;
    }
    
     //dd($year);
         //dd($coordinador_tesis);
         foreach($coordinador_tesis as $coordinador)
        {  
           $id_coordinador=$coordinador->id; 
           $nombre_coordinador=$coordinador->name; 
        }
         $grado_director_tesis=Grado_academico::find($id_coordinador);
         $grado_director_tesis->grado_academico=mb_strtoupper($grado_director_tesis->grado_academico);
    $profesor_guia=DB::table('users')->where('name','=',$tesis->profesor_guia)->get();
    $j=0;
    $iniciales_coordinador=array();
    for($i=0;$i<strlen($nombre_coordinador);$i++)
        {
            if(($nombre_coordinador[$i]=="A" or $nombre_coordinador[$i]=="B" or $nombre_coordinador[$i]=="C" or $nombre_coordinador[$i]=="D" or $nombre_coordinador[$i]=="E" or $nombre_coordinador[$i]=="F" or $nombre_coordinador[$i]=="G" or $nombre_coordinador[$i]=="H" or $nombre_coordinador[$i]=="I" or $nombre_coordinador[$i]=="J" or $nombre_coordinador[$i]=="K" or $nombre_coordinador[$i]=="L" or $nombre_coordinador[$i]=="M" or $nombre_coordinador[$i]=="N" or $nombre_coordinador[$i]=="Ñ" or $nombre_coordinador[$i]=="O" or$nombre_coordinador[$i]=="P" or $nombre_coordinador[$i]=="Q" or $nombre_coordinador[$i]=="R" or $nombre_coordinador[$i]=="S" or $nombre_coordinador[$i]=="T" or $nombre_coordinador[$i]=="V" or $nombre_coordinador[$i]=="W" or $nombre_coordinador[$i]=="U" or $nombre_coordinador[$i]=="X" or $nombre_coordinador[$i]=="Y" or $nombre_coordinador[$i]=="Z"))
        {
              array_push($iniciales_coordinador,$nombre_coordinador[$i]);
        }
    }
    //dd($iniciales_coordinador);
     $secretaria=DB::table('users')->where('tipo_usuario','=',4)->first();
     //dd($secretaria->name);
     $nombre_secretaria=$secretaria->name;
    $iniciales_secretaria=array();
    for($i=0;$i<strlen($nombre_secretaria);$i++)
        {
            if(($nombre_secretaria[$i]=="A" or $nombre_secretaria[$i]=="B" or $nombre_secretaria[$i]=="C" or $nombre_secretaria[$i]=="D" or $nombre_secretaria[$i]=="E" or $nombre_secretaria[$i]=="F" or $nombre_secretaria[$i]=="G" or $nombre_secretaria[$i]=="H" or $nombre_secretaria[$i]=="I" or $nombre_secretaria[$i]=="J" or $nombre_secretaria[$i]=="K" or $nombre_secretaria[$i]=="L" or $nombre_secretaria[$i]=="M" or $nombre_secretaria[$i]=="N" or $nombre_secretaria[$i]=="Ñ" or $nombre_secretaria[$i]=="O" or$nombre_secretaria[$i]=="P" or $nombre_secretaria[$i]=="Q" or $nombre_secretaria[$i]=="R" or $nombre_secretaria[$i]=="S" or $nombre_secretaria[$i]=="T" or $nombre_secretaria[$i]=="V" or $nombre_secretaria[$i]=="W" or $nombre_secretaria[$i]=="U" or $nombre_secretaria[$i]=="X" or $nombre_secretaria[$i]=="Y" or $nombre_secretaria[$i]=="Z"))
        {
              array_push($iniciales_secretaria,strtolower($nombre_secretaria[$i]));
        }
    }
    foreach($profesor_guia as $profe)
    {   
        $id_profesor_guia=$profe->id;
        $profesor_guia_nombre=$profe->name;
        $sexo_profe_guia=$profe->sexo;
    }
    $nombre_coordinador=mb_strtoupper($nombre_coordinador);
    $profesor_guia=Grado_academico::find($id_profesor_guia);
    $alumno1=DB::table('users')->where('name','=',$tesis->nombre_completo)->get();
    $alumno2=DB::table('users')->where('name','=',$tesis->nombre_completo2)->get();
    //dd($alumno1);
    $sexo1=null;
    $sexo2=null;
    $tesis->nombre_tesis=mb_strtoupper($tesis->nombre_tesis);
    //dd($tesis->nombre_tesis);
    foreach($alumno1 as $al){
        $sexo1=$al->sexo;
    }
    
   
            foreach($alumno2 as $al2)
            {
                $sexo2=$al2->sexo;
            }
        $i=0;
        $j=0;
        while($i<15){              //Con ciclo while se cuentan los 15 dias solo para los habiles con i, y con j todos los dias.
           $date=date('w', strtotime($fecha));
           if($date=="6" or $date=="0"){
            $j=$j+1;
            }elseif($date=="1" or $date=="2" or $date=="3" or $date=="4" or $date=="5"){
             $i=$i+1;
             $j=$j+1;  
            //dd($date);
            }
            $fecha=$fecha->addDay();
        }
        //dd(date('w', strtotime($fecha)));
        //dd("6");
        //dd($j);
        //En caso de que al sumar 15 dias de como resultado un dia sabado, entonces deberá sumar 2 dias mas, para que resulte un dia lunes
        $fecha=now()->addDays($j);
        if((date('w', strtotime($fecha)))=="6")
        {
          $fecha=now()->addDays($j+2);  
        }
        //dd($fecha);
       
        //dd($nombre_coordinador);
        //dd($coordinador_tesis);
         $revision->nombre_memorandum=mb_strtoupper($revision->nombre_memorandum);
        $revision->escuela1=mb_strtoupper($revision->escuela);
         return view('memorandum.memorandum_revision5',compact('tesis','comision','revision','num_memo','nombre_coordinador','year','dia_fecha','mes_fecha','sexo1','sexo2','fecha','profesor_guia','sexo_profe_guia','grado_director_tesis','coordinador','iniciales_coordinador','iniciales_secretaria'));
      }
    
      public function create_num_memo_titulados($id)
      {
        //dd($id);
        //$id_usuario=Auth::id();
        //dd($id_usuario);
        //$user=User::find($id_usuario);
        //dd($id);
        $tesista=DB::table('tesis')->where('tesis.id_pk',$id)->get();
        foreach($tesista as $tesis);
        //if($user->tipo_usuario==4 or $user->tipo_usuario==3){
            return view('tesis.createnummemotitulados',compact('tesis'));
        //}else{
          //  return view('tesis.sinpermiso');
        //}
      }


        public function memorandum_titulados(Request $request)
   {

     //dd($request);
    $director_escuela_consulta=DB::table('users')->where('director_escuela',1)->get();
    foreach($director_escuela_consulta as $director_escuela);
    $director_escuela->name=mb_strtoupper($director_escuela->name);
    $grado_academico_director_escuela_consulta=DB::table('grado_academico_profesor_planta')->where('id',$director_escuela->id)->get();
    foreach($grado_academico_director_escuela_consulta as $grado_academico_director_escuela);
    $grado_academico_director_escuela->grado_academico=mb_strtoupper($grado_academico_director_escuela->grado_academico);
    $id=$request->get('id_tesis');
    $num_memo=$request->numero;
    //dd($num_memo);
    $user=User::find($id);
     //$tesistas=DB::table('tesis')->join('recopilacion_inf_titulados','tesis.id','=','recopilacion_inf_titulados.id')->join('users','tesis.id','=','users.id')->where('tesis.id',$id)->where('tesis.id','=',$user->id)->get();
    //foreach($tesistas as $tesis);
    $tesista=DB::table('tesis')->where('id_pk',$id)->get();
    foreach($tesista as $tesis);
    $users=DB::table('users')->where('director_escuela',1)->get();
    foreach($users as $director_escuela);
    $memos=DB::table('memorandum')->where('nombre_memorandum','=','Titulación')->get();
    foreach($memos as $memo); 
   $memo->nombre_jefe_titulo=mb_strtoupper($memo->nombre_jefe_titulo);
   $memo->escuela1=mb_strtoupper($memo->escuela);
    //dd($tesis);
    $fecha=now();

        $year=$fecha->year;
        $dia_fecha=$fecha->day; //obtengo dia
        $mes_fecha=$fecha->month;
    
    $fecha_presentacion=Carbon::parse($tesis->fecha_presentacion_tesis);
    $year_presentacion=$fecha_presentacion->year;
    $dia_presentacion=$fecha_presentacion->day;
    $mes_presentacion=$fecha_presentacion->month;
    $hora_presentacion=$fecha_presentacion->format('H:i');
    
    switch($mes_presentacion)
    {
     case 1: $mes_presentacion="Enero";
     break;
     case 2: $mes_presentacion="Febrero";
     break;
     case 3: $mes_presentacion="Marzo";
     break;
     case 4:$mes_presentacion="Abril";
     break;
     case 5: $mes_presentacion="Mayo";
     break;
     case 6: $mes_presentacion="Junio";
     break;
     case 7: $mes_presentacion="Julio";
     break;
     case 8: $mes_presentacion="Agosto";
     break;
     case 9: $mes_presentacion="Septiembre";
     break;
     case 10:$mes_presentacion="Octubre";
     break;
     case 11:$mes_presentacion="Noviembre";
     break;
     case 12:$mes_presentacion="Diciembre";
     break;
    }

    $largo_mayusculas_director_escuela=0;
    $nombre_director_escuela=$director_escuela->name;
    $iniciales_director_escuela=array();
     for($i=0;$i<strlen($nombre_director_escuela);$i++)
        {
            if(($nombre_director_escuela[$i]=="A" or $nombre_director_escuela[$i]=="B" or $nombre_director_escuela[$i]=="C" or $nombre_director_escuela[$i]=="D" or $nombre_director_escuela[$i]=="E" or $nombre_director_escuela[$i]=="F" or $nombre_director_escuela[$i]=="G" or $nombre_director_escuela[$i]=="H" or $nombre_director_escuela[$i]=="I" or $nombre_director_escuela[$i]=="J" or $nombre_director_escuela[$i]=="K" or $nombre_director_escuela[$i]=="L" or $nombre_director_escuela[$i]=="M" or $nombre_director_escuela[$i]=="N" or $nombre_director_escuela[$i]=="Ñ" or $nombre_director_escuela[$i]=="O" or $nombre_director_escuela[$i]=="P" or $nombre_director_escuela[$i]=="Q" or $nombre_director_escuela[$i]=="R" or $nombre_director_escuela[$i]=="S" or $nombre_director_escuela[$i]=="T" or $nombre_director_escuela[$i]=="V" or $nombre_director_escuela[$i]=="W" or $nombre_director_escuela[$i]=="U" or $nombre_director_escuela[$i]=="X" or $nombre_director_escuela[$i]=="Y" or $nombre_director_escuela[$i]=="Z"))
        {
              array_push($iniciales_director_escuela,$nombre_director_escuela[$i]);
              $largo_mayusculas_director_escuela=$largo_mayusculas_director_escuela+1;
        }     
    }
    //dd($largo_mayusculas_director_escuela);
    $j=0;
        switch($mes_fecha)
    {
     case 1: $mes_fecha="Enero";
     break;
     case 2: $mes_fecha="Febrero";
     break;
     case 3: $mes_fecha="Marzo";
     break;
     case 4:$mes_fecha="Abril";
     break;
     case 5: $mes_Fecha="Mayo";
     break;
     case 6: $mes_fecha="Junio";
     break;
     case 7: $mes_fecha="Julio";
     break;
     case 8: $mes_fecha="Agosto";
     break;
     case 9: $mes_fecha="Septiembre";
     break;
     case 10:$mes_fecha="Octubre";
     break;
     case 11:$mes_fecha="Noviembre";
     break;
     case 12:$mes_fecha="Diciembre";
     break;
    }
 
    $sexo1=null;
    $sexo2=null;
    $alumno1=DB::table('users')->where('name','=',$tesis->nombre_completo)->get();
    $alumno2=DB::table('users')->where('name','=',$tesis->nombre_completo2)->get();
    $nombre1=null;
    $nombre2=null;
    foreach($alumno1 as $al)
    {
        $sexo1=$al->sexo;
        $nombre1=mb_strtoupper($al->name);
    }
    foreach($alumno2 as $al2)
    {
    $sexo2=$al2->sexo;
    $nombre2=mb_strtoupper($al2->name);
    }
     $director_escuela->name=mb_strtoupper($director_escuela->name);//Poner en mayuscula nombre director escuela.
    //dd($director_escuela);

   return view('memorandum.memorandum_titulados',compact('tesis','director_escuela','memo','year','mes_fecha','dia_fecha','num_memo','director_escuela','grado_academico_director_escuela','sexo1','sexo2','fecha','iniciales_director_escuela','hora_presentacion','dia_presentacion','mes_presentacion','year_presentacion','nombre1','nombre2','largo_mayusculas_director_escuela','num_memo'));
   }

   public function create_fecha_descargar_actas()
   {
    $fecha=Carbon::parse(now());
    $año=$fecha->year;
    //dd($año); 
    $mes_dia_inicio="01-01";
    $mes_dia_final="11-30";
    $fecha_inicio=$año."-" . $mes_dia_inicio;
    $fecha_final=$año."-". $mes_dia_final;
    return view('tesis.create_fecha_descargar_actas',compact('fecha_inicio','fecha_final'));
   }

   public function getDownload($file){
        //PDF file is stored under project/public/download/info.pdf
        return Response::download($file);
}

   public function descargar_actas(Request $request){

    $fecha_inicio=$request->fecha_inicio;
    $fecha_final=$request->fecha_fin;
    $id=Auth::id();
    $usuario=User::find($id);
    $profes=DB::table('users')->where('id',$id)->get();
    foreach($profes as $profe);
    //dd($profe);
    $profesor_guia=DB::table('comision')->join('tesis','comision.id','=','tesis.id')->where('id_profesor_guia',$id)->whereNotNull('tesis.acta_ex')->get();
    //dd($profesor_guia);
    $profesor1=DB::table('comision')->join('tesis','comision.id','=','tesis.id')->where('comision.profesor1_comision','=',$profe->name)->whereNotNull('tesis.acta_ex')->whereBetween('tesis.fecha_presentacion_tesis',[$fecha_inicio,$fecha_final])->get();

    $profesor2=DB::table('comision')->join('tesis','comision.id','=','tesis.id')->where('comision.profesor2_comision',$profe->name)->whereNotNull('tesis.acta_ex')->whereBetween('tesis.fecha_presentacion_tesis',[$fecha_inicio,$fecha_final])->get();
    $profesor3=DB::table('comision')->join('tesis','comision.id','=','tesis.id')->where('comision.profesor3_comision',$profe->name)->whereNotNull('tesis.acta_ex')->whereBetween('tesis.fecha_presentacion_tesis',[$fecha_inicio,$fecha_final])->get();
       
    $zip=new ZipArchive();
    $zip_name=time().".zip";
    $zip->open($zip_name,ZipArchive::CREATE);
    $file_folder=public_path().'\acta_ex/';
    $zip->addEmptyDir($file_folder);
    //dd($profesor_guia);

    foreach($profesor_guia as $profe){
             //Zipper::make('download_path/report_attachements.zip')->add(public_path().'\acta_ex/', $profe->acta_ex);
             $zip->addFile($file_folder.$profe->acta_ex);

    }
  

    //dd($profesor_guia);

    if($profesor_guia!=null)
    {
         foreach($profesor_guia as $profe)
        {
            //dd($profe->acta_ex);
            $zip->addFile($file_folder.$profe->acta_ex);
             //Zipper::make('download_path/report_attachements.zip')->add(public_path().'\acta_ex/', $profe->acta_ex);
        }
    }

     if($profesor1!=null)
     {
            foreach($profesor1 as $profe)
         {
            //dd($profe->acta_ex);
            //Zipper::make('download_path/report_attachements.zip')->add(public_path().'\acta_ex/', $profe->acta_ex);
             $zip->addFile($file_folder.$profe->acta_ex);
        }
    }

    if($profesor2!=null){
    foreach($profesor2 as $profe)
            {
            //Zipper::make('download_path/report_attachements.zip')->add(public_path().'\acta_ex/', $profe->acta_ex);
            $zip->addFile($file_folder.$profe->acta_ex);
            }
    }
    if($profesor3!=null)
    {
     foreach($profesor3 as $profe)
            {
            //Zipper::make('download_path/report_attachements.zip')->add(public_path().'\acta_ex/', $profe->acta_ex);
            $zip->addFile($file_folder.$profe->acta_ex);
            }
    }
     $zip->close();
 // Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
 header("Content-type: application/octet-stream");
 header("Content-disposition: attachment; filename=miarchivo.zip");
 // leemos el archivo creado
 readfile($zip_name);
 // Por último eliminamos el archivo temporal creado
 unlink($zip_name);//Destruye el archivo temporal
}

    
     public function index_solicitud_nota_pendiente_director()
      {
        $id=Auth::id();
        $user=User::findorfail($id);
        //dd($user);
        if($id==null)
        {
            return('tesis.sinpermiso');
        }

        if($user->tipo_usuario==2 and $user->director_escuela==1){
             $tesistas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado4',1)->whereNull('estado6')->whereNotnull('nota_pendiente')->paginate(7);
        return view('tesis.index_solicitud_nota_pendiente_director',compact('tesistas','user'));  
        }else{
            return view('tesis.sinpermiso');
        }

      }

        //VER SOLICITUDES DE NOTA PRORROGA DEL PROFESOR y DIRECTOR DE ESCUELA SE PREGUNTA SI EL USUARIO QUE INGRESA A ESTA SESION ES O NO PROFESOR, SI ES ENTONCES LO REDIRECCIONA A LA VISTA CON EL RESPECTIVO LISTADO.


        public function index_solicitud_nota_prorroga_director()
      {
        $id=Auth::id();
        $user=User::findorfail($id);
        if($id==null)
        {
            return('tesis.sinpermiso');
        }if($user->tipo_usuario==2 and $user->director_escuela==1){
            $tesistas=DB::table('tesis')->whereNotNull('nota_pendiente')->whereNotNull('nota_prorroga')->where('estado5',1)->whereNull('estado7')->paginate(7);
            return view('tesis.index_solicitud_nota_prorroga_director',compact('tesistas','user'));
        }else{

            return view('tesis.sinpermiso');
        }


      }




     public function aceptar_nota_pendiente_director($id)
      {
        $tesistas=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesistas as $tesis);
        return view('tesis.aceptar_nota_pendiente_director',compact('tesis'));

      }

      //Se acepta la nota prorroga o la modifica el mismo profesor
       public function aceptar_nota_prorroga_director($id)
      {
        $tesistas=DB::table('tesis')->where('id_pk',$id)->get();
        foreach($tesistas as $tesis);
        return view('tesis.aceptar_nota_prorroga_director',compact('tesis'));

      }


        public function pendiente_director_update(Request $request,$id)
      {
        $tes=Tesis::findorfail($id);
        $tes->nota_pendiente=$request->nota_pendiente;
        $tes->estado6=1;
        $tes->update();
        $idprofe=Auth::id();
        $users=DB::table('users')->where('id',$idprofe)->get();
        foreach($users as $user);
        $tesistas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado4',1)->whereNull('estado6')->whereNotnull('nota_pendiente')->paginate(7);
        return view('tesis.index_solicitud_nota_pendiente_director',compact('tesistas'));        

      }

      public function prorroga_director_update(Request $request,$id)
      {
        //dd($request);
        $tes=Tesis::findorfail($id);
        $tes->nota_prorroga=$request->nota_prorroga;
        $tes->estado7=1;
        $tes->update();
        $idprofe=Auth::id();
        $users=DB::table('users')->where('id',$idprofe)->get();
        foreach($users as $user);
        $tesistas=DB::table('tesis')->whereNotNull('nota_pendiente')->whereNotNull('nota_prorroga')->where('estado5',1)->whereNull('estado7')->paginate(7);
        return view('tesis.index_solicitud_nota_prorroga_director',compact('tesistas'));

      }
  

}

       

