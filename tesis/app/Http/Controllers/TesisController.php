<?php

namespace App\Http\Controllers;
use App\User;
use App\Tesis;
use App\Comision;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Contracts\Auth\Guard;
use iio\libmergepdf\Merger;
use iio\libmergepdf\Pages;
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
         $tesis=DB::table('tesis')->where('fecha_presentacion_tesis','<',now())->paginate(7);
        
        if($nombre_completo==null and $nombre_tesis==null and $abstract==null)
        {
            $tesis=DB::table('tesis')->where('fecha_presentacion_tesis','<',now())
            ->paginate(7);
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
               $tesis=DB::table('tesis')->where('fecha_presentacion_tesis','<',now())
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
                                 
                                 ->where('nombre_tesis','like',"%$nombre_tesis%")
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
                                     
                                    ->where('nombre_completo','like',"%$nombre_completo%")
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

        $tes=DB::table('tesis')->where('id',$id)->first();
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
        $tesis->nombre_tes_res=Str::limit($tesis->nombre_tesis,30);
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
        if($id==null){
            return('welcome');
        }
        $user=User::findorfail($id);
        //dd($user);
        $tesistas=DB::table('tesis')->where('nombre_completo','=',$user->name)->orwhere('nombre_completo2','=',$user->name)->paginate(7);
        //dd($tesistas);
        return view('tesis.index1',compact('tesistas','user'));

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
        $tesista=Tesis::find($id);
        $area_tesis=DB::table('area_tesis')->get();
        $empresas=DB::table('empresas')->get();
        $comunidads=DB::table('comunidad')->get();
        $fcs=DB::table('fondo_concursable')->get();
        $proyectos=DB::table('proyectos')->get();
        if($tesista==null){
        return view('tesis.create',compact('alumno','profes','area_tesis','empresas','comunidads','fcs','proyectos'));
        }else
        {
            return view('tesis.tesisregistrada');
        }
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
        $request->validate([
            'nombre_completo' => 'required|string',
            'rut' => 'required|string|unique:tesis|min:11|max:12',
            'ano_ingreso' => 'required|integer',
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

        //En caso de que complete 2 de los 3 campos del segundo alumno tesista
        //dd($request);
        if(($request->nombre_completo2==null and $request->rut2!=null and $request->ano_ingreso2!=null)or($request->nombre_completo2!=null and $request->rut2==null and $request->ano_ingreso2!=null)or($request->nombre_completo2!=null and $request->rut2!=null and $request->ano_ingreso2==null)or($request->nombre_completo2!=null and $request->rut2==null and $request->ano_ingreso2==null)or($request->nombre_completo2==null and $request->rut2!=null and $request->ano_ingreso2==null)or $request->nombre_completo2==null and $request->rut2==null and $request->ano_ingreso2!=null)
        {
        //dd($request->nombre_completo2);
            return view('tesis.error_campos');

        }

        $rut1=DB::table('tesis')->select('rut')->get();
        $contador=0;
        $buscar_segundo_alumno_user=DB::table('users')->where('name','=',$request->nombre_completo2)->get();
        $buscar_segundo_alumno_tesis=DB::table('tesis')->where('nombre_completo','=',$request->nombre_completo2)->orwhere('nombre_completo2','=',$request->nombre_completo2)->get();
        $users=DB::table('users')->first();

        //En caso de que el rut ya exista en la bd, es por que se ingresó mal
        foreach($rut1 as $rut)
        {
            if($rut->rut==$request->rut2){
                return view('tesis.error_rut');
            }
        }

        //Si el usuario no existe en el registro de usuario entonces no podra registrarse segundo alumno
        //dd($buscar_segundo_alumno_user);
    
          
          

   

        //buscar si el alumno ya tiene una tesis creada
        //dd($buscar_segundo_alumno_tesis);
        //dd($buscar_segundo_alumno_tesis->isEmpty());
       


        $id=Auth::id();
        $user=User::findorfail($id);


        if($user->tipo_usuario==1 and $request->nombre_completo2!=null and $request->rut2!=null and $request->ano_ingreso2!=null){ 

            //dd('buscar_segundo_alumno_user'=> $buscar_segundo_alumno_user);
            //dd($buscar_segundo_alumno_user->isEmpty());
            //dd($buscar_segundo_alumno_user);
            if(($buscar_segundo_alumno_user->isEmpty())==true){
                 return view('tesis.usuario_no_existe');
                //echo 'Si son iguales';
            }

            if(($buscar_segundo_alumno_tesis->isEmpty())==false){
            return view('tesis.tesisregistrada');
            }

            $user->name=$request->nombre_completo;
            $user->save();
            DB::table('tesis')->insert([
                'id' => $id,
                'nombre_completo' => $request->nombre_completo,
                'nombre_completo2' => $request->nombre_completo2,
                'rut' =>$request->rut,
                'rut2' =>$request->rut2,
                'ano_ingreso' => $request->ano_ingreso,
                'ano_ingreso2' => $request->ano_ingreso2,
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
            DB::table('tesis')->insert([
                'id' => $id,
                'nombre_completo' => $request->nombre_completo,
                'rut' =>$request->rut,
                'ano_ingreso' => $request->ano_ingreso,
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

        
    }
        

        //Muestra la informacion de la tesis    
        public function show($id)
        {
        //$tesis=DB::table('tesis')->where('id', $id)->first();

        $tesis=DB::table('tesis')->where('id',$id)->first();
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
                $tes = Tesis::findorfail($id);
                $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                $area_tesis=DB::table('area_tesis')->get();
                $empresas=DB::table('empresas')->get();
                $comunidads=DB::table('comunidad')->get();
                $fcs=DB::table('fondo_concursable')->get();
                 $proyectos=DB::table('proyectos')->get();
            if(!Auth::id()){
                return view('sinpermiso');
            }elseif($user->tipo_usuario==1 and $tes->estado1==1 and $tes->estado2==null){
               
                //$tes->estado1=2;
                //$tes->update();
                return view('tesis.edit',compact('tes','profes','area_tesis','empresas','comunidads','fcs','proyectos'));
                //return $user;
            }elseif($user->tipo_usuario==1 and$tes->estado1==5 and $tes->estado2==null){
            $tes->estado1=1;
            $tes->estado2=null;
            $tes->estado3=1;
            $tes->update();
            return view('tesis.edit',compact('tes','profes','area_tesis')); 
            }else{
                return view('tesis.noeditartesis');
            }
        }




        public function pedir_nota_pendiente($id)
        {
            //$user = DB::table('users')->where('id', $id)->first();
            //return view('users.edit',compact('user'));
                $idlogin=Auth::id();
                $user=User::findorfail($idlogin);
                $tes = Tesis::findorfail($id);
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

        		return view('welcome');
        }

           public function pedir_nota_prorroga($id)
        {
            //$user = DB::table('users')->where('id', $id)->first();
            //return view('users.edit',compact('user'));
                $idlogin=Auth::id();
                $user=User::findorfail($idlogin);
                $tes = Tesis::findorfail($id);
                //$profes=DB::table('users')->where('tipo_usuario','=',2)->get();
            $user=User::findorfail($id);
        	//dd($user->name);
        	$tesistas=DB::table('tesis');

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

        		$tes=Tesis::findorfail($id);
        		$tes->nota_prorroga=$request->get('nota_prorroga');
                $tes->estado5=null;
        		$tes->update();
        	$user=User::findorfail($id);
        	//dd($user->name);
        	$tesistas=DB::table('tesis');
        		return view('welcome');
        }

    function noeditartesis(){

    return view('tesis.noeditartesis');
        }

   
   //Aca el profesor editar el formulario solo si estado1=1, lo que quiere decir que el alumno a completado preliminarmente el formulario, luego si el mismo profesor a editado, entonces estado1=2 y estado2=null, entonces si lo ha enviado(estado1=2, estado2=1) al director de tesis aun puede editar. En caso de que el formulario sea rechazado por el director de tesis el profesor puede modificarlo.
    public function edit2($id)
    {
        if(!Auth::id()){
            return view('welcome');
        }else{

            $idlogin=Auth::id();
            $user=User::findorfail($idlogin);
            $tes = Tesis::findorfail($id);
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
                $tes->estado1=2;
                $tes->update();
                return view('tesis.edit2',compact('tes','profes','com','area_tesis','empresas','comunidads','fcs','proyectos'));
            }
            if($user->tipo_usuario==2 and $tes->estado1==2 and $tes->estado2==null)
            {           
            $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
            //$tes->estado1=3;
            //$tes->update();
           return view('tesis.edit2',compact('tes','profes','com','area_tesis', 'empresas','comunidads','fcs','proyectos'));
           }
                if($user->tipo_usuario==2 and $tes->estado1==2 and $tes->estado2==1){           
                $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                //$tes->estado1=3;
                //$tes->update();
                return view('tesis.edit2',compact('tes','profes','com','area_tesis'));
            	}elseif($user->tipo_usuario==2 and $tes->estado1==5 and $tes->estado2==null){
            		$tes->estado1=2;
            		$tes->estado2=null;
            		$tes->estado3=1;
            	 	$tes->update();
            		$profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                return view('tesis.edit2',compact('tes','profes','com','area_tesis','empresas','comunidads','fcs','proyectos'));
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

   //En caso de que el profesor quiera director entonces ocurre que estado1=3 y ya no podra editar el profesor.

    public function edit3($id){
        //dd($id);
        if(!Auth::id()){
            return view('tesis.sinpermiso');
        }else{

        	$idlogin=Auth::id();
	        $user=User::findorfail($idlogin);
	        $tes = Tesis::findorfail($id);
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
                $tes->update();
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
    function sinpermiso(){

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
        $tes=Tesis::findorfail($id);
        $comision=DB::table('comision')->where('id',$id)->first();
        $tes->estado1=3;
        $tes->update();
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
            $idlogin=Auth::id();
            $user=User::findorfail($idlogin);
            $tes=Tesis::findorfail($id);
        	$comision=DB::table('comision')->where('id',$id)->first();
            $com=DB::table('comision')->where('id',$id)->first();
            $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
            if($comision==null){
                //dd($comision);
                return view('tesis.edit2',compact('tes','com','profes'));
            }
            if($user->tipo_usuario==2 and (($tes->estado1==1) or ($tes->estado1==2))){         
        $tes->estado1=2;
        $tes->update();
                return view('tesis.evaluar',compact('tes','comision'));
            }else{
            	if($user->tipo_usuario==2 and $tes->estado1==5 and $tes->estado2==null){
            		$tes->estado1=2;
            		$tes->estado2=null;
            		 $tes->estado3=1;
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
        $tes=Tesis::findorfail($id);
        if($tes->estado1==1  or ($tes->estado1==2 and $tes->estado2=null))
        {
        $tes->nombre_completo=$request->get('nombre_completo');
        $tes->rut=$request->get('rut');
        $tes->ano_ingreso=$request->get('ano_ingreso');
        //En caso de que se ingresen los datos del segundo alumno tesista
        if($request->get('nombre_completo2')!=null){
            $tes->nombre_completo2=$request->get('nombre_completo2');
        }
         if($request->get('rut2')!=null){
            $tes->rut2=$request->get('rut2');
        }
         if($request->get('ano_ingreso2')!=null){
            $tes->ano_ingreso2=$request->get('ano_ingreso2');
        }
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
        $user=User::findorfail($id);
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
            'ano_ingreso' => 'required|integer',
            'profesor1_comision' => 'required|string',
            'profesor2_comision' => 'required|string',
            'profesor3_comision' =>'string',
        ]);
        $idlogin=Auth::id();
        $user=User::findorfail($id);
        if($idlogin==null){
            return view('tesis.sinpermiso');
        }
        //return 'tamos';
        $idlogin=Auth::id();
        $profe=User::findorfail($idlogin);
        $tes=Tesis::findorfail($id);
        $tes->nombre_completo=$request->get('nombre_completo');
        $tes->rut=$request->get('rut');
        $tes->ano_ingreso=$request->get('ano_ingreso');
        //En caso de que se ingresen los datos del segundo alumno tesista
        
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
        $user=User::findorfail($id);
        $user->name=$tes->nombre_completo;
        $user->update();


        //$comision=new Comision;
        //$alumno=DB::table('users')->join('tesis','users.name','=',$tes->nombre_completo)->get();
        //dd($alumno);
        //$comision =new Comision;;
        //$comision->id_profesor_guia=$profe->id;
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
            'correo_profe2_externo' => $request->correo_profe2_externo,
            'institucion2' => $request->institucion2,
        ]);
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


        $idlogin=Auth::id();
        $user=User::findorfail($id);
        if($idlogin==null){
            return view('tesis.sinpermiso');
        }

        $idlogin=Auth::id();
        $tes=Tesis::findorfail($id);
        $tes->nombre_completo=$request->get('nombre_completo');
        $tes->rut=$request->get('rut');
        $tes->ano_ingreso=$request->get('ano_ingreso');
        //En caso de que se ingresen los datos del segundo alumno tesista
        if($tes->nombre_completo2!=null)
        {
            $tes->nombre_completo2=$request->get('nombre_completo2');
            $tes->ano_ingreso2=$request->get('ano_ingreso2');
            $tes->rut2=$request->get('rut2');
        }
        $tes->profesor_guia=$request->get('profesor_guia');
        $id_profesor=DB::table('users')->where('users.name','=',$tes->profesor_guia)->select('id')->get();
        //dd($id_profesor);
        foreach($id_profesor as $id_profe)
        {
            $id_profesor_guia=$id_profe->id;

        }
        $tes->nombre_tesis=$request->get('nombre_tesis');
        $tes->area_tesis=$request->get('area_tesis');
        $tes->carrera=$request->get('carrera');
        $tes->tipo_vinculacion=$request->get('tipo_vinculacion');
        $tes->nombre_vinculacion=$request->get('nombre_vinculacion');
        $tes->tipo=$request->get('tipo');
        $tes->descripcion=$request->get('descripcion');
        $tes->objetivos=$request->get('objetivos');
        $tes->contribucion=$request->get('contribucion');
        $tes->observacion=$request->get('observacion');
        $tes->update();
        $user=User::findorfail($id);
        $user->name=$tes->nombre_completo;
        $user->update();

        //$comision=new Comision;
        //$alumno=DB::table('users')->join('tesis','users.name','=',$tes->nombre_completo)->get();
        //dd($alumno);
        //$comision =new Comision;;
        //$comision->id_profesor_guia=$profe->id;
        
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
            if($tes->estado1==4 and $tes->estado2==1 and $tes->constancia_ex==null){

                    return view('tesis.vista_subir_archivo',compact('tes'));
            }
            else{
                if($tes->fecha_presentacion_tesis >= now()){
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
        $tesis=Tesis::find($id);
        if($request->hasFile('constancia_ex')){
         $file = $request->file('constancia_ex');
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().'\constancia_ex/', $name);
        $tesis->constancia_ex=$name;
        $tesis->publicar=$request->publicar;
        $tesis->abstract=$request->abstract;
        $tesis->update();
        //dd($tes);
        //($request->file('constancia_ex')->store('public'));
                   //almacenar el archivo pdf/doc subido al sistem
           return view('alumnohome');
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
        $tes=Tesis::findorfail($id);
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
        $tes->estado2=1;
       $tes->update();
   		}elseif(($request->get('estado'))=='Rechazar'){
   		$tes->estado1=1;
        $tes->estado2=null;
        $tes->update();
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
        $tes=Tesis::findorfail($id);
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
        $tes->estado2=1;
        $tes->fecha_inscripcion=date('Y-m-d');
       $tes->update();
   		}elseif(($request->get('estado'))=='Rechazar inscripcion'){
   		$tes->estado1=5;
        $tes->estado2=null;
        $tes->update();
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



    public function destroy($id)
    {
        //
        DB::table('tesis')->where('id', $id)->delete();
        return back()->with('status','La tesis ha sido eliminada con exito');
    }


    //Vista para generar informe de tesis relacionadas a empresas, recordar que los valores estado1=4 y estado2=1, son para las tesis inscritas, y posteriormente se verifica que la fecha de inscripcion pertenezca a los rangos de fechas definidos en la vista rango_fechas
    public function printTesis(Request $request){

       $fecha_inicio=$request->fecha_inicio;
       $fecha_final=$request->fecha_final;
       $tes_empresas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Empresa')->whereBetween('fecha_inscripcion',[$fecha_inicio,$fecha_final])->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion')->get();

		$html = view('tesis.print', ['tes_empresas' => $tes_empresas])->render();

		return $html;
   }
   //Vista para generar informe de tesis relacionadas a proyectos, recordar que los valores estado1=4 y estado2=1, son para las tesis inscritas, y posteriormente se verifica que la fecha de inscripcion pertenezca a los rangos de fechas definidos en la vista rango_fechas

    public function printTesisp(Request $request){

        $fecha_inicio=$request->fecha_inicio;
       $fecha_final=$request->fecha_final;
        $tes_proyectos=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Proyecto')->whereBetween('fecha_inscripcion',[$fecha_inicio,$fecha_final])->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion')->get();

		$html = view('tesis.printTesisp', ['tes_proyectos' => $tes_proyectos])->render();

		return $html;
   }
  // Vista para generar informe de tesis relacionadas a comunidad, recordar que los valores estado1=4 y estado2=1, son para las tesis inscritas, y posteriormente se verifica que la fecha de inscripcion pertenezca a los rangos de fechas definidos en la vista rango_fechas
   public function printTesisc(Request $request){

        $fecha_inicio=$request->fecha_inicio;
       $fecha_final=$request->fecha_final;
    	 $tes_comunidad=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Comunidad')->whereBetween('fecha_inscripcion',[$fecha_inicio,$fecha_final])->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion')->get(); 

		$html = view('tesis.printTesisc', ['tes_comunidad' => $tes_comunidad])->render();

		return $html;
   }
   //Vista para generar informe de tesis relacioandas a fondos concursables, recordar que los valores estado1=4 y estado2=1, son para las tesis inscritas, y posteriormente se verifica que la fecha de inscripcion pertenezca a los rangos de fechas definidos en la vista rango_fechas
   public function printTesisfc(Request $request){

        $fecha_inicio=$request->fecha_inicio;
        $fecha_final=$request->fecha_final;
    	$tes_fondoconcursable=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Fondo concusable')->whereBetween('fecha_inscripcion',[$fecha_inicio,$fecha_final])->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion')->get();  

		$html = view('tesis.printTesisfc', ['tes_fondoconcursable' => $tes_fondoconcursable])->render();

		return $html;
   }

   public function acta_examen($id)
   {
    $tesis=DB::table('tesis')->join('comision','tesis.id','=','comision.id')->where('tesis.id',$id)->get();
    //dd($tesis);
    foreach($tesis as $tes)
    {
        //para obtener campos necesario de la tupla de la base de datos, el dia, mes, año y la hora, usando carbon
        //paquete de laravel para trabajar con fechas.
        $fecha=Carbon::parse($tes->fecha_presentacion_tesis);
        $nombre_dia=$day=date('w', strtotime($fecha));
        $dia_fecha=$fecha->day;
        $mes_fecha=$fecha->month;
        $year_fecha=$fecha->year;
        $hora_presentacion_tesis=$fecha->format('H:i');
    }

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

    return view('tesis.acta_examen',compact('tesis','dia_fecha','nombre_dia','mes_fecha','year_fecha','hora_presentacion_tesis'));
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

   //Una vez que el alumno haya presentado su tesis la secretaria podra insertar la nota de tesis en el sistema
   public function ingresar_nota_tesis($id)
   {
     $tesis=Tesis::find($id);
     return view('tesis.ingresar_nota_tesis',compact('tesis'));  

   }

   public function update_nota_tesis($id, Request $request)
   {
        $tes=Tesis::find($id);
        $tes->nota_tesis=$request->nota_tesis;
        $tes->update();
        return view('secretariahome');
   } 
        //Una vez que el alumno haya subido su constancia de examen se le redireccionará a la vista para definir su fecha de 
        //inscripcion tesis 
     public function fecha_presentacion($id)
   {
     //dd($id);
     $tesis=Tesis::find($id);
    // dd($tesis);
     //dd($tesis->id);
     return view('tesis.fecha_presentacion',compact('tesis'));  

   }

    public function update_fecha_presentacion($id, Request $request)
   {
        //dd($request);
        $tes=Tesis::find($id);
        $todas_tesis=DB::table('tesis')->get();
        $tesis=Tesis::find($id);
        $tes->fecha_presentacion_tesis=$request->fecha_presentacion_tesis;
        $tes->update();
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
            $tes=Tesis::find($id);
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

        $tesis = Tesis::find($id);
        $pathToFile =public_path().'\constancia_ex/'.$tesis->constancia_ex;
        return response()->file($pathToFile);

    }

    public function verPDF_acta($id){

        $tesis = Tesis::find($id);
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
        if($id==null)
        {
            return('tesis.sinpermiso');
        }
        if($user->tipo_usuario==2){
            $tesistas=DB::table('tesis')->whereNotNull('nota_pendiente')->whereNull('nota_prorroga')->whereNull('estado4')->where('profesor_guia','=',$user->name)->paginate(7);
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
            return view('tesis.index_solicitud_nota_prorroga',compact('tesistas','user'));
        }                

      }

      //Se acepta la nota pendiente o la modifica el mismo profesor
      public function aceptar_nota_pendiente($id)
      {
        $tesis=Tesis::find($id);
        return view('tesis.aceptar_nota_pendiente',compact('tesis'));

      }

      //Se acepta la nota prorroga o la modifica el mismo profesor
       public function aceptar_nota_prorroga($id)
      {
        $tesis=Tesis::find($id);
        return view('tesis.aceptar_nota_prorroga',compact('tesis'));

      }


      public function pendiente_update(Request $request,$id)
      {
        $tes=Tesis::findorfail($id);
        $tes->nota_pendiente=$request->nota_pendiente;
        $tes->estado4=1;
        $tes->update();
        return view('profesorhome');        

      }

      public function prorroga_update(Request $request,$id)
      {
        //dd($request);
        $tes=Tesis::findorfail($id);
        $tes->nota_prorroga=$request->nota_prorroga;
        $tes->estado5=1;
        $tes->update();
        return view('profesorhome');

      }

      

      /*public function plazo_nota_extendida()
      {
        $id=Auth::id();
        $user=User::findorfail($id);
        if($id==null or $user->tipo_usuario!=2)
        {
            return('tesis.sinpermiso');
        }if($user->tipo_usuario==2){
             $tesistas=DB::table('tesis')->whereNotNull('nota_prorroga')->whereNull('estado5')->orwhereNull('nota_prorroga')->whereNull('estado4')->where('profesor_guia','=',$user->name)->whereNull('fecha_presentacion_tesis')->paginate(7);
             foreach($tesistas as $tesis)
             {
                if($tesis->nota_prorroga==null and $tesis->nota_pendiente!=null and $tesis->estado4==null)
                {
                    $tesis->tipo_nota='Pendiente';
                    $tesis->fecha_venc=$tesis->nota_pendiente;
                }else{
                    if($tesis->nota_prorroga!=null and $tesis->nota_pendiente!=null and $tesis->estado5==null){
                        $tesis->tipo_nota='Prorroga';
                        $tesis->fecha_venc=$tesis->nota_prorroga;
                    }
                }
             }
             //dd($tesistas);
            return view('tesis.index_solicitud_nota_extendida',compact('tesistas','user'));
        }                


      }*/

    
    }
       

