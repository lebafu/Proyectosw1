<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;
use App\User;
use App\Tesis;
use App\Grado_academico;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Password;
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
            'email' => 'required|string|unique:users',
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
      //dd($request);
        $ultimo_id=DB::table('users')->max('id');
        //dd($ultimo_id);
        //dd($request->tipo_usuario);
        if($request->tipo_usuario==4){
          $nombre_secretaria=$request->name;
        //dd($nombre_secretaria);
        $cont_mayusculas_secretaria=0;
        $cont_espacios_secretaria=0;
            for($i=0;$i<strlen($nombre_secretaria);$i++)
        {
            if(($nombre_secretaria[$i]=="A" or $nombre_secretaria[$i]=="B" or $nombre_secretaria[$i]=="C" or $nombre_secretaria[$i]=="D" or $nombre_secretaria[$i]=="E" or $nombre_secretaria[$i]=="F" or $nombre_secretaria[$i]=="G" or $nombre_secretaria[$i]=="H" or $nombre_secretaria[$i]=="I" or $nombre_secretaria[$i]=="J" or $nombre_secretaria[$i]=="K" or $nombre_secretaria[$i]=="L" or $nombre_secretaria[$i]=="M" or $nombre_secretaria[$i]=="N" or $nombre_secretaria[$i]=="Ñ" or $nombre_secretaria[$i]=="O" or$nombre_secretaria[$i]=="P" or $nombre_secretaria[$i]=="Q" or $nombre_secretaria[$i]=="R" or $nombre_secretaria[$i]=="S" or $nombre_secretaria[$i]=="T" or $nombre_secretaria[$i]=="V" or $nombre_secretaria[$i]=="W" or $nombre_secretaria[$i]=="U" or $nombre_secretaria[$i]=="X" or $nombre_secretaria[$i]=="Y" or $nombre_secretaria[$i]=="Z"))
        {
              $cont_mayusculas_secretaria=$cont_mayusculas_secretaria+1;
        }
        if($nombre_secretaria[$i]==" ")
        {
              $cont_espacios_secretaria=$cont_espacios_secretaria+1;
        }
      }
      //dd($cont_espacios_secretaria);
      //dd($cont_mayusculas_secretaria);
      if($cont_espacios_secretaria!=3 or $cont_mayusculas_secretaria!=4)
      {
        return view('tesis.error_cantidad_espacios_mayusculas');
      }
    }
    if($request->tipo_usuario==3){
      $nombre_coordinador=$request->name;
       $cont_mayusculas_coordinador=0;
       $cont_espacios_coordinador=0;
    for($i=0;$i<strlen($nombre_coordinador);$i++)
        {
            if(($nombre_coordinador[$i]=="A" or $nombre_coordinador[$i]=="B" or $nombre_coordinador[$i]=="C" or $nombre_coordinador[$i]=="D" or $nombre_coordinador[$i]=="E" or $nombre_coordinador[$i]=="F" or $nombre_coordinador[$i]=="G" or $nombre_coordinador[$i]=="H" or $nombre_coordinador[$i]=="I" or $nombre_coordinador[$i]=="J" or $nombre_coordinador[$i]=="K" or $nombre_coordinador[$i]=="L" or $nombre_coordinador[$i]=="M" or $nombre_coordinador[$i]=="N" or $nombre_coordinador[$i]=="Ñ" or $nombre_coordinador[$i]=="O" or$nombre_coordinador[$i]=="P" or $nombre_coordinador[$i]=="Q" or $nombre_coordinador[$i]=="R" or $nombre_coordinador[$i]=="S" or $nombre_coordinador[$i]=="T" or $nombre_coordinador[$i]=="V" or $nombre_coordinador[$i]=="W" or $nombre_coordinador[$i]=="U" or $nombre_coordinador[$i]=="X" or $nombre_coordinador[$i]=="Y" or $nombre_coordinador[$i]=="Z"))
        {
           $cont_mayusculas_coordinador=$cont_mayusculas_coordinador+1;
        }
        if($nombre_coordinador[$i]==" ")
        {
          $cont_espacios_coordinador=$cont_espacios_coordinador+1;
        }
    }
    if($cont_espacios_coordinador!=3 or $cont_mayusculas_coordinador!=4)
      {
        return view('tesis.error_cantidad_espacios_mayusculas');
      }
        }

       DB::table('users')->insert([
            'id' => $ultimo_id+1,
            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'tipo_usuario' =>$request->tipo_usuario,
            'sexo' =>$request->sexo,
        ]);

        $email=$request->get('email');
        $profes=DB::table('users')->where('email',$email)->get();
        //para transformar consulta en array, que pueda ser recibido por la vista, y saber 
        //a que profesor corresponderá el grado academico a seleccionar
        foreach($profes as $profesor);
                //dd($profesor->id);
        if($request->tipo_usuario==2 or $request->tipo_usuario==3){
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
        //dd($request);
        if($request->tipo_usuario==3 or $request->tipo_usuario==4)
        {
        if($request->tipo_usuario==4){
             dd($request);
          $nombre_secretaria=$request->name;
        $cont_mayusculas_secretaria=0;
        $cont_espacios_secretaria=0;
            for($i=0;$i<strlen($nombre_secretaria);$i++)
        {
            if(($nombre_secretaria[$i]=="A" or $nombre_secretaria[$i]=="B" or $nombre_secretaria[$i]=="C" or $nombre_secretaria[$i]=="D" or $nombre_secretaria[$i]=="E" or $nombre_secretaria[$i]=="F" or $nombre_secretaria[$i]=="G" or $nombre_secretaria[$i]=="H" or $nombre_secretaria[$i]=="I" or $nombre_secretaria[$i]=="J" or $nombre_secretaria[$i]=="K" or $nombre_secretaria[$i]=="L" or $nombre_secretaria[$i]=="M" or $nombre_secretaria[$i]=="N" or $nombre_secretaria[$i]=="Ñ" or $nombre_secretaria[$i]=="O" or$nombre_secretaria[$i]=="P" or $nombre_secretaria[$i]=="Q" or $nombre_secretaria[$i]=="R" or $nombre_secretaria[$i]=="S" or $nombre_secretaria[$i]=="T" or $nombre_secretaria[$i]=="V" or $nombre_secretaria[$i]=="W" or $nombre_secretaria[$i]=="U" or $nombre_secretaria[$i]=="X" or $nombre_secretaria[$i]=="Y" or $nombre_secretaria[$i]=="Z"))
        {
              $cont_mayusculas_secretaria=$cont_mayusculas_secretaria+1;
        }
        if($nombre_secretaria[$i]==" ")
        {
              $cont_espacios_secretaria=$cont_espacios_secretaria+1;
        }
      }
      dd($cont_espacios_secretaria);
      if($cont_espacios_secretaria!=3 or $cont_mayusculas_secretaria!=4)
      {
        return view('tesis.error_cantidad_espacios_mayusculas');
      }
    }
    if($request->tipo_usuario==3){
      $nombre_coordinador=$request->name;
       $cont_mayusculas_coordinador=0;
       $cont_espacios_coordinador=0;
    for($i=0;$i<strlen($nombre_coordinador);$i++)
        {
            if(($nombre_coordinador[$i]=="A" or $nombre_coordinador[$i]=="B" or $nombre_coordinador[$i]=="C" or $nombre_coordinador[$i]=="D" or $nombre_coordinador[$i]=="E" or $nombre_coordinador[$i]=="F" or $nombre_coordinador[$i]=="G" or $nombre_coordinador[$i]=="H" or $nombre_coordinador[$i]=="I" or $nombre_coordinador[$i]=="J" or $nombre_coordinador[$i]=="K" or $nombre_coordinador[$i]=="L" or $nombre_coordinador[$i]=="M" or $nombre_coordinador[$i]=="N" or $nombre_coordinador[$i]=="Ñ" or $nombre_coordinador[$i]=="O" or$nombre_coordinador[$i]=="P" or $nombre_coordinador[$i]=="Q" or $nombre_coordinador[$i]=="R" or $nombre_coordinador[$i]=="S" or $nombre_coordinador[$i]=="T" or $nombre_coordinador[$i]=="V" or $nombre_coordinador[$i]=="W" or $nombre_coordinador[$i]=="U" or $nombre_coordinador[$i]=="X" or $nombre_coordinador[$i]=="Y" or $nombre_coordinador[$i]=="Z"))
        {
           $cont_mayusculas_coordinador=$cont_mayusculas_coordinador+1;
        }
        if($nombre_coordinador[$i]==" ")
        {
          $cont_espacios_coordinador=$cont_espacios_coordinador+1;
        }
    }
    if($cont_espacios_coordinador!=3 or $cont_mayusculas_coordinador!=4)
      {
        return view('tesis.error_cantidad_espacios_mayusculas');
      }
    }
        }
        $user=User::findorfail($id);
        $nombre_actual=$user->name;
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
        if($user->tipo_usuario==1){
        //Actualizar nombre del alumno en tabla tesis y comision
        $tesis=DB::table('tesis')->where('nombre_completo','=',$nombre_actual)->get();
                foreach($tesis as $tes)
                {
                 $tes->nombre_completo=$user->name;
                 DB::table('tesis')->where('nombre_completo','=',$nombre_actual)->update(['nombre_completo' => $tes->nombre_completo]);
                }
        $tesis=DB::table('tesis')->where('nombre_completo2','=',$nombre_actual)->get();
                foreach($tesis as $tes)
                {
                 $tes->nombre_completo2=$user->name;
                  DB::table('tesis')->where('nombre_completo2','=',$nombre_actual)->update(['nombre_completo2' => $tes->nombre_completo2]);
                }
        $comision=DB::table('comision')->where('nombre_alumno','=',$nombre_actual)->get();
                foreach($comision as $com)
                {
                    $com->nombre_alumno=$user->name;
                     DB::table('comision')->where('nombre_alumno','=',$nombre_actual)->update(['nombre_alumno' => $com->nombre_alumno]);
                }
        }
        foreach($profes as $profesor);
                //dd($profesor->id);
        if($request->tipo_usuario==2 or  $request->tipo_usuario==3){
            //Actualizar nombre del profesor en el sistema, en tablas tesis y comision.
            //dd($user->name);
             DB::table('tesis')->where('profesor_guia','=',$nombre_actual)->update(['profesor_guia' => $user->name]);
             DB::table('comision')->where('profesor1_comision','=',$nombre_actual)->update(['profesor1_comision' => $user->name]);
             DB::table('comision')->where('profesor2_comision','=',$nombre_actual)->update(['profesor2_comision' => $user->name]);
             DB::table('comision')->where('profesor3_comision','=',$nombre_actual)->update(['profesor3_comision' => $user->name]);

             return view('grado_academico_create',compact('profesor'));   
        }
        return view('/adminhome');
    }




    public function destroy($id)
    {
        //
        DB::table('users')->where('id', $id)->delete();
        return back()->with('status','El usuario ha sido eliminado con exito');
    }

    /**/
    //Se almacena el grado academico dee profesor
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

    //Modificar grado academico solo debe descomentar linea de profesorhome y director_escuelahome
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
        $nombre_actual=$user->name;
        $user=User::findorfail($id);
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->tipo_usuario=2;
        $user->sexo=$request->get('sexo');
        $user->update();
        $grado_academico=Grado_academico::find($id);
        $grado_academico->grado_academico=$request->get('grado_academico');
        $grado_academico->update();
        DB::table('tesis')->where('profesor_guia','=',$nombre_actual)->update(['profesor_guia' => $user->name]);
        DB::table('comision')->where('profesor1_comision','=',$nombre_actual)->update(['profesor1_comision' => $user->name]);
        DB::table('comision')->where('profesor2_comision','=',$nombre_actual)->update(['profesor2_comision' => $user->name]);
        DB::table('comision')->where('profesor3_comision','=',$nombre_actual)->update(['profesor3_comision' => $user->name]);
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



   public function showLinkRequestForm(Request $request)
    {   
         //dd($request->email);
         if($request->email!=null)
            {

                    $users=DB::table('users')->where('email','=',$request->email)->get();
                    foreach($users as $user)
                    {
                        $usuario->name=$user->name;
                        $usuario->email=$user->email;
                    }
            Mail::send('auth.passwords.view_email',$usuario,function($message)
                    {
                        $message->from('leonardo211294@gmail.com');
                        $message->to($request->email)->subject('test Email Curso Laravel');
                    }); 
        }
        return view('auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }

    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    /**
     * Get the needed authentication credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only('email');
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        return back()->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => trans($response)]);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }

}
