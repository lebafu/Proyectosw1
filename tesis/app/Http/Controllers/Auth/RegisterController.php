<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tipo_usuario' => ['required','integer'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tipo_usuario' => $data['tipo_usuario'],
        ]);

        if(($request->tipo_usuario)==1)
        {
             $id=$this->auth->user()->id;
             DB::table('tesis')->insert([
            'id' => $id,
            'nombre_completo' => '',
            'rut' => '',
            'profesor_guia' => ''
            'carrera' => '',
            'tipo' => '',
            'descripcion' =>'',
            'objetivos' =>'',
            'tipo_vinculacion' => '',
            'nombre_vinculacion' => '',
            'estado1' => 1,
            'estado2' => null,
        ]);

            DB::table('comision')->insert([
            'id' => $id,
            'id_profesor_guia' => null,
            'nombre_alumno' => $data['name'],
            'profesor1_comision' => ''
            'profesor2_comision' => '',
            'profesor3_comision' => '',
            'descripcion' =>'',
            'objetivos' =>'',
            'tipo_vinculacion' => '',
            'nombre_vinculacion' => '',
            'estado1' => 1,
            'estado2' => null,
        ]);

    }
}
