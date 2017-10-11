<?php

namespace App\Http\Controllers;

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
            /**'nombre'=>'required|min:4|max:120',
            'password'=>'required|min:6|max:16',*/
        ]);

        $ficha=new CE_Ficha;
        $ficha->idficha=$request->idficha;
        $ficha->num_resolucion=$request->num_resolucion;
        $ficha->num_registro=$request->num_registro;
        $ficha->ambito=$request->ambito;
        $ficha->nombre_ins=$request->nombre_ins;
        $ficha->sector=$request->sector;
        $ficha->direccion=$request->direccion;
        $ficha->nombre_coor=$request->telefono_coor;
        $ficha->email_coor=$request->email_coor;
        $ficha->nom_area=$request->coor_area;
        $ficha->telefono=$request->telefono;
        $ficha->email=$request->email;
        $ficha->convenio_idconvenio=$request->convenio_idconvenio;
        $ficha->save();

        return Redirect::to('convenios');
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
        $usuario=CE_Usuario::findOrFail($id);
        $rol=DB::table('rol')->get();
        $estado=DB::table('estado')->get();
        return view('usuarios.edit', compact('usuario','rol','estado'));
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
            'password'=>'required|min:6|max:16',
        ]);
        $usuario = CE_Usuario::findOrFail($id);

        $usuario->nombre=$request->nombre;
        $usuario->correo=$request->correo;
        $usuario->password=$request->password;
        $usuario->rol_idrol=$request->idrol;
        $usuario->estado_idestado=$request->idestado;
        $usuario->update();

        return Redirect::to('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario=CE_Usuario::findOrFail($id);
        $usuario->estado_idestado='2';
        $usuario->update();
        return Redirect::to('usuarios');
    }
    public function Eliminar($id)
    {
        $usuario=CE_Usuario::findOrFail($id);
        $usuario->estado_idestado='3';
        $usuario->update();
        return Redirect::to('usuarios');
    }
}