<?php

namespace App\Http\Controllers;

use App\CE_Ambito;
use App\CE_Ficha;
use App\Repository\ConvenioRepo;
use Illuminate\Http\Request;
use App\CE_Convenio;
use App\CE_tipo;
use App\archivo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ConvenioRequest;
use DB;

class ConvenioController extends Controller
{


    protected $repoComvenio;

    public function __construct(ConvenioRepo $repoc)
    {
        $this->repoComvenio = $repoc;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request)
        {
            $tipo= $this->repoComvenio->getEstadosConvenio();
            $convenio = $this->repoComvenio->getTypeCovenio(1);
            return $convenio;
            //return view('convenios.index',compact('convenio','tipo'));
        }
    }

    /**

     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $ti= CE_tipo::orderBy('nombre','ASC')->get();
        $amb=DB::table('ambito')->get();
        $pa=DB::table('pais')->get();
        $es=DB::table('estado')->get();
        $ar=DB::table('archivo')->get();
        $cat=$this->repoComvenio->getCategoria(1); // 1 = convenio 2 = contrato
        return view('convenios.create',compact('ti','amb','pa','es','ar','cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /* ALMACENAR EL OBJETO DEL MODELO CONVENIOS*/
    public function store(ConvenioRequest $request)
    {
        $this->repoComvenio->saveConvenioNew($request);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* VER DETALLES DE CONVENIO*/
    public function show($id)
    {
        $convenio = $this->repoComvenio->getConveioById($id);
        return view('convenios.show',compact('convenio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $convenio=CE_Convenio::findOrFail($id);
        $Ti=DB::table('tipo')->get();
        $amb=DB::table('ambito')->get();
        $pa=DB::table('pais')->get();
        $es=DB::table('estado')->get();
        $fi=DB::table('ficha')->get();
        return view('convenios.edit', compact('convenio','Ti','tc','amb','pa','es','fi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConvenioRequest $request, $id)
    {
        $this->validate($request,[

            'titulo'=>'required|min:1|max:240',
            'codigo'=>'required|min:1|max:240',
            'objetivo'=>'required|min:1|max:240',
            'duracion'=>'required|min:1|max:240',
            'fecha_inicio'=>'required|min:1|max:240',
            'fecha_final'=>'required|min:1|max:240',
        ]);

        $convenio = CE_Convenio::findOrFail($id);
       
        $convenio->titulo=$request->titulo;
        $convenio->codigo=$request->codigo;
        $convenio->resolucion=$request->resolucion;
        $convenio->objetivo=$request->objetivo;
        $convenio->duracion=$request->duracion;
        $convenio->fecha_ini=$request->fecha_inicio;
        $convenio->fecha_fin=$request->fecha_final;
        $convenio->tipo_idtipo=$request->idtipo;
        $convenio->tipoconvenio_idtipoconvenio=$request->idtipoconvenio;
        $convenio->ambito_idambito=$request->idambito;
        $convenio->pais_idpais=$request->idpais;
        $convenio->estado_idestado=$request->idestado;
        $convenio->update();

        return Redirect::to('convenios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$convenio=CE_Convenio::findOrFail($id);
        $convenio->estado='Inactivo';
        $convenio->update();
        return Redirect::to('convenio');*/
    }
    public function Eliminar($id)
    {
        $convenio=CE_Convenio::findOrFail($id);
        $convenio->estado_idestado='3';
        $convenio->update();
        return Redirect::to('convenios');
    }

    public function verFicha($id)
    {
        $convenio=CE_Convenio::findOrFail($id);
        $fic=CE_Ficha::get();
        $amb=CE_Ambito::get();
        /*$con = DB::table('convenio as con')->join('ficha as f', 'con.idconvenio', '=', 'f.convenio_idconvenio')
            ->select('f.idficha', 'f.num_resolucion as nure', 'f.num_registro', 'f.ambito', 'f.nombre_ins', 'f.sector', 'f.direccion'
                , 'f.nombre_coor', 'f.telefono_coor', 'f.email_coor', 'f.nom_area', 'f.coor_area', 'f.telefono', 'f.email',
                'con.titulo')
            ->where('con.idconvenio', '=', 'f.convenio_idconvenio')
            ->orderBy('idficha', 'ASC')->paginate();*/

        return view('convenios.ficha', compact('convenio', 'fic','amb'));
    }

    public function verImg($id)
    {
        $convenio=CE_Convenio::findOrFail($id);
        $fic=CE_Ficha::get();
        $files = $this->repoComvenio->getFilesConvenioById($id);
        return view('convenios.img', compact('convenio', 'fic','files'));
    }

    public function uploadFile(Request $request){
       ini_set('memory_limit','500M');
        $file = $request->file('file');
        $path = public_path() . '/Files';
        $exten = $file->extension();
        $filenameOrigi= $file->getClientOriginalName();
        $idFile= md5($file->getClientOriginalName(). time());
        $filename = $idFile.'.'.$exten;
        $file->move($path, $filename);
        $this->repoComvenio->saveFilePathJSON(null,$filename,$exten,$filenameOrigi);
       return $filename;

    }
    public function verComvenioVigente(){
        $convenio = $this->repoComvenio->getTypeCovenio(1);
        return view('convenios.index',compact('convenio'));
    }
    public function verComvenioVencido(){
        $convenio = $this->repoComvenio->getTypeCovenio(2);
        return view('convenios.index',compact('convenio'));
    }
    public function verComvenioTramite(){
        $convenio = $this->repoComvenio->getTypeCovenio(3);
        return view('convenios.index',compact('convenio'));
    }

    public function deleteFile(Request $request){
        $file_name = $request['file_name'];
        $file = $this->repoComvenio->deleteFile($file_name);
        $meto = unlink(public_path() . '/Files/'.$file);

        return response()->json($meto);
    }

}
