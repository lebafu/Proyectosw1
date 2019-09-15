<?php

namespace App\Http\Controllers;

use App\Fondo_concursable;
use Illuminate\Http\Request;
use DB;

class FondoConcursableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fcs=DB::table('fondo_concursable')->paginate(7);
        return view('fondoconcursable.index',compact('fcs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('fondoconcursable.create');
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


       DB::table('fondo_concursable')->insert([
            'nombre' => $request->nombre,
        ]);

        $fcs=DB::table('fondo_concursable')->paginate(7);
        return view('fondoconcursable.index',compact('fcs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fondo_concursable  $fondo_concursable
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $fc=DB::table('fondo_concursable')->get();
         return view('fondoconcursable.show',compact('fc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fondo_concursable  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $fc = DB::table('fondo_concursable')->where('id', $id)->first();
        return view('fondoconcursable.edit',compact('fc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fondo_concursable  $fondo_concursable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $fc=Fondo_concursable::findorfail($id);
        $fc->nombre=$request->get('nombre');
        $fc->update();

        $fcs=DB::table('fondo_concursable')->paginate(7);
        return view('fondoconcursable.index',compact('fcs'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fondo_concursable  $fondo_concursable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         DB::table('fondo_concursable')->where('id', $id)->delete();
        return back()->with('status','El fondo concursable se ha eliminado con exito');
    }
}
