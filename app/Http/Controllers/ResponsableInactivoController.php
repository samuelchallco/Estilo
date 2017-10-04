<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CE_Estado;
use DB;

class ResponsableInactivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $responsable=DB::table('responsable as re')
        ->join('estado as es','re.estado_idestado','=','es.idestado')
        ->select('re.idresponsable','re.nombre','re.descripcion','es.idestado','es.nombre as esnom')
        ->where('es.idestado','=','3')
        ->orderBy('idresponsable','ASC')->paginate();

        return view('resinac.index',compact('responsable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre'=>'required|min:4|max:120',
            
            ]);
        
        $responsable=new CE_Responsable;
        $responsable->idresponsable=$request->idresponsable;
        $responsable->nombre=$request->nombre;
        $responsable->descripcion=$request->descripcion;
        $responsable->estado_idestado=$request->idestado;
        $responsable->save();

        return Redirect::to('responsables');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsable=CE_Responsable::findOrFail($id);
        $estado=DB::table('estado')->get();
        return view('responsables.edit', compact('responsable','estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre'=>'required|min:4|max:120',
            ]);
        $responsable = CE_Responsable::findOrFail($id);
       
        $responsable->nombre=$request->nombre;
        $responsable->descripcion=$request->descripcion;
        $responsable->estado_idestado=$request->idestado;
        $responsable->update();

        return Redirect::to('responsables');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
