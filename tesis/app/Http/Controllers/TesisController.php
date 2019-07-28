<?php

namespace App\Http\Controllers;
use App\User;
use App\Tesis;
use App\Comision;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Contracts\Auth\Guard;
use DB;
use Auth;
use Closure;
use Session;


class TesisController extends Controller
{
	public function tesis_empresa()
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


	}
        public function index2()
    {
        $id=Auth::id();
        if($id==null){
            return('tesis.sinpermiso');
        }
        $user=User::findorfail($id);
        //dd($user->name);
        $tesistas=DB::table('tesis')->orderby('fecha_peticion','desc')->paginate(7);
        return view('tesis.index2',compact('tesistas','user'));

    }

        public function index2_ins_pro()
    {
        $id=Auth::id();
        if($id==null){
            return('tesis.sinpermiso');
        }
        $user=User::findorfail($id);
        //dd($user->name);
        $tesistas=DB::table('tesis')->orderby('fecha_peticion','desc')->paginate(7);
        return view('tesis.index2_ins_pro',compact('tesistas','user'));

    }


  

      public function index3_solicitudes()
    {
        $id=Auth::id();
        if($id==null){
            return view ('tesis.sinpermiso');
        }
        $user=User::findorfail($id);
        if($user->tipo_usuario==3){
        $tesistas=DB::table('tesis')->orderby('fecha_peticion','desc')->paginate(7);
        return view('tesis.index3_sol',compact('tesistas','user'));
       }else{
       	return view('tesis.sinpermiso');
       }

    }

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
        return view('tesis.index3_ins',compact('tesistas','user'));
       }else{
       	return view('tesis.sinpermiso');
       }

    }



    public function imprimir_tesis_inscritas()
    {
        $id=Auth::id();
        if($id==null){
            return view ('tesis.sinpermiso');
        }
        $user=User::findorfail($id);
        if($user->tipo_usuario==3){
        $tesistas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->paginate(7);
        return view('tesis.imprimir_tesis_inscritas',compact('tesistas','user'));
       }else{
        return view('tesis.sinpermiso');
       }

    }

        public function index1()
    {
        $id=Auth::id();
        if($id==null){
            return('welcome');
        }
        $user=User::findorfail($id);
        //dd($user->name);
        $tesistas=DB::table('tesis')->where('id','=',$id)->paginate(7);
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
        if($tesista==null){
        return view('tesis.create',compact('alumno','profes'));
        }else{
            return view('tesis.tesisregistrada');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string',
            'rut' => 'required|string|unique:tesis|min:7|max:8',
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



        /*DB::table('users')->insert([
            'name' => $request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'tipo_usuario' => $request->tipo_usuario,
            'rut' =>$request->rut,
        ]);*/
            //dd($request->nombre_completo);
        $id=Auth::id();
        $user=User::findorfail($id);
        //si usuario es de tipo alumno entonces se actualizara el nombre usuario en user
        if($id==null){
            return view('welcome');
        }
        if($user->tipo_usuario==1){ 

            $user->name=$request->get('nombre_completo');
            $user->update();
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

    return  view('welcome');
        
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
        

    
        public function show($id)
        {
        //$tesis=DB::table('tesis')->where('id', $id)->first();

        $tesis=DB::table('tesis')->where('id',$id)->first();
        $comision=DB::table('comision')->where('id',$id)->first();
        $tes=$tesis;
        $com=DB::table('comision')->where('id',$id)->first();
        //dd($com);
        if($com==null){
            return view('tesis.edit2',compact('tes','com'));
        }
            return view('tesis.show',compact('tesis','comision'));
        }


        public function edit($id)
        {
            //$user = DB::table('users')->where('id', $id)->first();
            //return view('users.edit',compact('user'));
                $idlogin=Auth::id();
                $user=User::findorfail($idlogin);
                $tes = Tesis::findorfail($id);
                $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
            

            if(!Auth::id()){
                return view('sinpermiso');
            }elseif($user->tipo_usuario==1 and $tes->estado1==1 and $tes->estado2==null){
               
                //$tes->estado1=2;
                //$tes->update();
                return view('tesis.edit',compact('tes','profes'));
                //return $user;
            }elseif($user->tipo_usuario==1 and$tes->estado1==5 and $tes->estado2==null){
            $tes->estado1=1;
            $tes->estado2=null;
            $tes->estado3=1;
            $tes->update();
            return view('tesis.edit',compact('tes','profes')); 
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
        		$tes->update();
        	$user=User::findorfail($id);
        	//dd($user->name);
        	$tesistas=DB::table('tesis');
        		return view('welcome');
        }

    function noeditartesis(){

    return view('tesis.noeditartesis');
        }

   
    public function edit2($id)
    {
        if(!Auth::id()){
            return view('welcome');
        }else{

            $idlogin=Auth::id();
            $user=User::findorfail($idlogin);
            $tes = Tesis::findorfail($id);
            $com =Comision::find($id);
            //dd($com);
            //if($com==null){
            //dd($com);
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

   

    public function edit3($id){
        //dd($id);
        if(!Auth::id()){
            return view('tesis.sinpermiso');
        }else{

        	$idlogin=Auth::id();
	        $user=User::findorfail($idlogin);
	        $tes = Tesis::findorfail($id);
	        $com=Comision::find($id);
            //dd($com);
            if($user->tipo_usuario==3 && $tes->estado1==2 && $tes->estado2==1 ){           
                $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                $tes->estado1=3;
                $tes->update();
                //dd($tes->tipo_vinculacion);
                return view('tesis.edit3',compact('tes','profes','com'));
            }else{
            	if($user->tipo_usuario==3 && $tes->estado1==3 && $tes->estado2==1 ){           
                $profes=DB::table('users')->where('tipo_usuario','=',2)->get();
                //dd($tes->tipo_vinculacion);
                return view('tesis.edit3',compact('tes','profes','com'));
            }else{
            	return view('tesis.sinpermiso');
            }
        }

	} 
}

    function sinpermiso(){

    return view('tesis.sinpermiso');
        }

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
    public function evaluar($id)
    {
        if(!Auth::id()){
            return view('tesis.sinpermiso');
        }else{

            $idlogin=Auth::id();
            $user=User::findorfail($idlogin);
            $tes=Tesis::findorfail($id);
        	$comision=DB::table('comision')->where('id',$id)->first();
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
        //Suponiendo que se desea saber las notas pendientes vencidas dentro de un determinado intervalo de tiempo
       //$notas_pendientes_vencidas=DB::table('tesis')->whereNull('nota_prorroga')->where('nota_pendiente','>=',$request->fecha_inicio)->where('nota_prorroga','<=',$request->fecha_final);

       //Consulta en caso de que se desee conocer todas las notas pendientes vencidas inclusive anterior al intervalo definido por la consulta//
        $data=DB::table('tesis')->whereNotNull('nota_prorroga')->whereBetween('nota_prorroga',[$fecha_inicio,$fecha_final])->get();
       return view('tesis.filtro_prorroga',[
            'notas_prorrogas_vencidas' => $data,
            'fecha_inicio' => $fecha_inicio,
            'fecha_final' => $fecha_final
        ]);
    }


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


   //Me manda los datos a este controlador
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
        return view('welcome');
        }else{
             return back()->with('status','El registro de tesis ha fallado');
        }
    }



    public function update2(Request $request,$id)
    {

        //dd($request);
        $request->validate([
            'profesor_guia' => 'required|string',
            'nombre_completo' => 'required|string',
            'rut' => 'required|string|min:7|max:8',
            'ano_ingreso' => 'required|integer',
            'profesor1_comision' => 'required|string',
            'profesor2_comision' => 'required|string',
            'profesor3_comision' =>'string',
        ]);

        //return 'tamos';
        //dd($request);
        $idlogin=Auth::id();
        $profe=User::findorfail($idlogin);
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
            'profesor2_comision' => $request->profesor2_comision,
            'profesor3_comision' => $request->profesor3_comision,
            'profesor1_externo' => $request->profesor1_externo,
            'correo_profe1_externo' => $request->correo_profe1_externo,
            'profe2_externo' => $request->profesor2_externo,
            'institucion1' => $request->institucion1,
            'correo_profe2_externo' => $request->correo_profe2_externo,
            'institucion2' => $request->institucion2,
        ]);

        return view('welcome');
    }

     public function update5(Request $request,$id)
    {

        //dd($request);
        $request->validate([
            'profesor_guia' => 'required|string',
            'nombre_completo' => 'required|string',
            'rut' => 'required|string|min:7|max:8',
            'ano_ingreso' => 'required|integer',
            'profesor1_comision' => 'required|string',
            'profesor2_comision' => 'required|string',
            'profesor3_comision' =>'string',
        ]);

        //return 'tamos';
        //dd($request);
        $idlogin=Auth::id();
        $profe=User::findorfail($idlogin);
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
        ]);

        return view('welcome');
    }


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
                return view('tesis.archivosubido');
            }
        }

    }


    public function update_archivo_ex($id, Request $request)
    {       

        //dd($request);
        $tes=Tesis::find($id);
        $tes->constancia_ex=$request->file('constancia_ex')->store('public');
        $tes->update();
        //dd($tes);
        ($request->file('constancia_ex')->store('public'));

        return view('alumnohome');
    }

    public function update3($id)
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
        return view('welcome');
    }


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
        return view('welcome');
    }



    public function destroy($id)
    {
        //
        DB::table('tesis')->where('id', $id)->delete();
        return back()->with('status','La tesis ha sido eliminada con exito');
    }

    public function printTesis(){

    	$tes_empresas=DB::table('tesis')
    		->orderby('fecha_peticion','desc')
    		->where('estado1','=',4)
    		->where('estado2','=',1)
    		->where('tipo_vinculacion','=','Empresa')
    		->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion')->get();

		$html = view('tesis.print', ['tes_empresas' => $tes_empresas])->render();

		return $html;
   }


    public function printTesisp(){

    	$tes_proyectos=DB::table('tesis')
    		->orderby('fecha_peticion','desc')
    		->where('estado1','=',4)
    		->where('estado2','=',1)
    		->where('tipo_vinculacion','=','Proyecto')
    		->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion')->get();

		$html = view('tesis.printTesisp', ['tes_proyectos' => $tes_proyectos])->render();

		return $html;
   }

   public function printTesisc(){

    	$tes_comunidad=DB::table('tesis')
    		->orderby('fecha_peticion','desc')
    		->where('estado1','=',4)
    		->where('estado2','=',1)
    		->where('tipo_vinculacion','=','Comunidad')
    		->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion')->get();

		$html = view('tesis.printTesisc', ['tes_comunidad' => $tes_comunidad])->render();

		return $html;
   }

   public function printTesisfc(){

    	$tes_fondoconcursable=DB::table('tesis')
    		->orderby('fecha_peticion','desc')
    		->where('estado1','=',4)
    		->where('estado2','=',1)
    		->where('tipo_vinculacion','=','Fondo concusable')
    		->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion')->get();

		$html = view('tesis.printTesisfc', ['tes_fondoconcursable' => $tes_fondoconcursable])->render();

		return $html;
   }

   public function acta_examen($id)
   {
    $tesis=DB::table('tesis')->join('comision','tesis.id','=','comision.id')->where('tesis.id',$id)->get();
    //dd($tesis);
    return view('tesis.acta_examen',compact('tesis'));
   }

     public function index_al_sec()
   {
    $tesistas=DB::table('tesis')->where('estado1','=',4)->where('estado2','=',1)->paginate(7);
        //dd($tesistas);
        return view('tesis.index_al_sec',compact('tesistas'));
   }

    /* public function imprimir_tesis_inscritas()
    {
        $id=Auth::id();
        if($id==null){
            return view ('tesis.sinpermiso');
        }
        $user=User::findorfail($id);
        if($user->tipo_usuario==3){
        $tesistas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->paginate(7);
        return view('tesis.imprimir_tesis_inscritas',compact('tesistas','user'));
       }else{
        return view('tesis.sinpermiso');
       }

    }*/



}
