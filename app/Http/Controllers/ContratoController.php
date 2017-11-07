<?php

namespace App\Http\Controllers;

use App\CE_Contrato;
use App\Repository\ContratoRepo;
use Illuminate\Http\Request;

use DB;

class ContratoController extends Controller
{
    protected $repoContrato;

    public function __construct(ContratoRepo $repo)
    {
        $this->repoContrato = $repo;
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $cont = $this->repoContrato->getTypeContrato(1);
            return $cont;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $amb=DB::table('ambito')->get();
        $pa=DB::table('pais')->get();
        $es=DB::table('estado')->get();
        $ar=DB::table('archivo')->get();
        $cat=$this->repoContrato->getCategoria(2); // 1 = convenio 2 = contrato
        return view('contrato.create',compact('amb','pa','es','ar','cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repoContrato->saveContratoNew($request);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato = $this->repoContrato->getContratoById($id);
        return view('contrato.show',compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verContratoVigente(){
        $contrato = $this->repoContrato->getTypeContrato(1);
        return view('contrato.index',compact('contrato'));
    }

    public function verContratoVencido(){
        $contrato = $this->repoContrato->getTypeContrato(2);
        return view('contrato.index',compact('contrato'));
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
        $this->repoContrato->saveFilePathJSON(null,$filename,$exten,$filenameOrigi);
        return $filename;

    }

    public function deleteFile(Request $request){
        $file_name = $request['file_name'];
        $file = $this->repoContrato->deleteFile($file_name);
        $meto = unlink(public_path() . '/Files/'.$file);

        return response()->json($meto);
    }

    public function verImgContrato($id)
    {
        $contrato=CE_Contrato::findOrFail($id);
        $files = $this->repoContrato->getFilesContratoById($id);
        return view('contrato.img', compact('contrato', 'files'));
    }

    public function EliminarContrato($id)
    {
        $contrato=CE_Contrato::findOrFail($id);
        $contrato->estado_idestado='2';
        $contrato->update();
        return redirect()->back();
    }

}
