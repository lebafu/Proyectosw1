<?php

namespace App\Http\Controllers;

use App\Proyecto;
use Illuminate\Http\Request;
use DB;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proyectos=DB::table('proyectos')->paginate(7);
        return view('proyectos.index',compact('proyectos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proyectos.create');
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


       DB::table('proyectos')->insert([
            'nombre' => $request->nombre,
        ]);
        $proyectos=DB::table('proyectos')->paginate(7);
        return view('proyectos.index',compact('proyectos'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\proyecto  $ie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $proyecto=DB::table('proyectos')->get();
         return view('proyectos.show',compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\proyecto  $ie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $proyecto = DB::table('proyectos')->where('id', $id)->first();
        return view('proyectos.edit',compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $proyecto=Proyecto::findorfail($id);
        $nombre_actual=$proyecto->nombre;
        $proyecto->nombre=$request->get('nombre');
        $proyecto->update();
        DB::table('tesis')->where('nombre_vinculacion', $nombre_actual)->update(['nombre_vinculacion' => $request->nombre]);
        $proyectos=DB::table('proyectos')->paginate(7);
        return view('proyectos.index',compact('proyectos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         DB::table('proyectos')->where('id', $id)->delete();
        return back()->with('status','El proyecto ha sido eliminado con exito');
    }
}
