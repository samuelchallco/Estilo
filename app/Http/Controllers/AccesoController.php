<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\CE_Convenio;
use App\CE_Usuario;
use App\CE_Control;
use DB;

class AccesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $control=DB::table('convenio_has_responsable as co')->join('convenio as con','co.convenio_idconvenio','=','con.idconvenio')
        ->join('responsable as re','co.responsable_idresponsable','=','re.idresponsable')
        ->join('usuario as u','co.usuario_idusuario','=','u.idusuario')
        ->select('co.idcontrol','con.titulo','re.nombre','u.nombre as nomu','co.descripcion')

        ->orderBy('idcontrol','ASC')->paginate();

        return view('control.index',compact('control'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	

        $con=DB::table('convenio')->get();
        $res=DB::table('responsable')->get();  
        $us=DB::table('usuario')->get(); 
        return view('control.create',compact('con','res','us'));

        
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
            
            ]);
        
        $control=new CE_Control;
        $control->idcontrol=$request->idcontrol;
        $control->convenio_idconvenio=$request->idconvenio;
        $control->responsable_idresponsable=$request->idresponsable;
        $control->usuario_idusuario=$request->idusuario;
        $control->descripcion=$request->descripcion;
        $control->save();

        return Redirect::to('control');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       	$control=CE_Control::findOrFail($id);

        return view('control.show',compact('control'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $control=CE_Control::findOrFail($id);
        $convenio=DB::table('convenio')->get();
        $responsable=DB::table('responsable')->get();
        $usuario=DB::table('usuario')->get();
        return view('control.edit', compact('control','convenio','usuario','responsable'));
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
            
            ]);
        $control = CE_Control::findOrFail($id);
       
        $control->convenio_idconvenio=$request->idconvenio;
        $control->responsable_idresponsable=$request->idresponsable;
        $control->usuario_idusuario=$request->idusuario;
        $control->descripcion=$request->descripcion;
        $control->update();

        return Redirect::to('control');
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
