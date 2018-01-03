<?php

namespace App\Http\Controllers;

use App\CE_Convenio;
use Illuminate\Http\Request;
use App\CE_Ficha;

use DB;
use Illuminate\Support\Facades\Redirect;

class FichaController extends Controller
{
    public function index(Request $request)
    {

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



        ]);

        $ficha=new CE_Ficha;
        $ficha->idficha=$request->idficha;
        $ficha->num_resolucion=$request->num_resolucion;
        $ficha->num_registro=$request->num_registro;
        $ficha->ambito=$request->ambito;
        $ficha->nombre_ins=$request->nombre_ins;
        $ficha->sector=$request->sector;//RUC
        $ficha->direccion=$request->direccion;
        $ficha->nombre_coor=$request->nombre_coor;
        $ficha->cargo_coor=$request->cargo_coor;
        $ficha->telefono_coor=$request->telefono_coor;
        $ficha->email_coor=$request->email_coor;
        $ficha->nom_area=$request->nom_area;
        $ficha->coor_area=$request->coor_area;
        $ficha->telefono=$request->telefono;
        $ficha->email=$request->email;
        $ficha->convenio_idconvenio=$request->convenio_idconvenio;
        $ficha->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ficha=CE_Ficha::get($id);
        return compact('ficha');
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

        $ficha = CE_Ficha::findOrFail($id);

        $ficha->nombre=$request->num_resolucion;
        $ficha->correo=$request->correo;
        $ficha->password=$request->password;
        $ficha->rol_idrol=$request->idrol;
        $ficha->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idficha)
    {
        $ficha=CE_Ficha::findOrFail($idficha);
        $ficha->delete();
        return redirect()->back();
    }
    public function Eliminar($id)
    {

    }
}
