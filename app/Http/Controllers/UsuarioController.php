<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\CE_Rol;
use App\CE_Usuario;
use App\CE_Estado;

use DB;

class UsuarioController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario=DB::table('usuario as u')->join('rol as r','u.rol_idrol','=','r.idrol')
        ->join('estado as es','u.estado_idestado','=','es.idestado')
        ->select('u.idusuario','u.nombre','u.correo','u.password','r.tipo','es.nombre as esnom')
        ->where('es.idestado','=','2')
        ->orderBy('idusuario','ASC')->paginate();

        return view('usuarios.index',compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol=DB::table('rol')->get();
        $es=DB::table('estado')->get();  

        return view('usuarios.create',compact('rol','es'));

        
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
            'password'=>'required|min:6|max:16',
            ]);
        
        $usuario=new CE_Usuario;
        $usuario->idusuario=$request->idusuario;
        $usuario->nombre=$request->nombre;
        $usuario->correo=$request->correo;
        $usuario->password=$request->password;
        $usuario->rol_idrol=$request->idrol;
        $usuario->estado_idestado=$request->idestado;
        $usuario->save();

        return Redirect::to('usuarios');
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
