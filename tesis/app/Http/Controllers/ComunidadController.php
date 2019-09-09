<?php

namespace App\Http\Controllers;

use App\Comunidad;
use Illuminate\Http\Request;
use DB;

class ComunidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comunidads=DB::table('comunidad')->paginate(7);
        return view('comunidad.index',compact('comunidads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {//
      
        //
          return view('comunidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
           $request->validate([
            'nombre' => 'required|string',
     
        ]);


       DB::table('comunidad')->insert([
            'nombre' => $request->nombre,
        ]);

       return view('comunidad.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $comunidad=DB::table('comunidad')->get();
         return view('comunidad.show',compact('comunidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comunidad = DB::table('comunidad')->where('id', $id)->first();
        return view('comunidad.edit',compact('comunidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $comunidad=Comunidad::findorfail($id);
        $comunidad->nombre=$request->get('nombre');
        $comunidad->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('comunidad')->where('id', $id)->delete();
        return back()->with('status','El comunidad ha sido eliminado con exito');
    }
}
