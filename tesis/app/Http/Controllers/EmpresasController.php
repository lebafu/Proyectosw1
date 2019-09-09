<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use DB;

class EmpresasController extends Controller
{
    //

	public function index()
     {
        //
        $empresas=DB::table('empresas')->paginate();
        return view('empresas.index',compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {//
      
        //
          return view('empresas.create');
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


       DB::table('empresas')->insert([
            'nombre' => $request->nombre,
        ]);

       return view('empresas.index');
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
        $empresas=DB::table('empresas')->get();
         return view('empresas.show',compact('empresas'));
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
        $empresas = DB::table('empresas')->where('id', $id)->first();
        return view('empresas.edit',compact('empresas'));
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
        $empresas=Empresa::findorfail($id);
        $empresas->nombre=$request->get('nombre');
        $empresas->update();
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
        DB::table('empresas')->where('id', $id)->delete();
        return back()->with('status','La empresa se ha eliminado con exito');
    }
}
