<?php

namespace App\Http\Controllers;

use App\CE_Contrato;
use App\Repository\ContratoRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ContratoRequest;

use DB;
use PhpParser\Node\Stmt\Return_;
use Maatwebsite\Excel\Facades\Excel;

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
        $es=DB::table('estado')->where('idestado','!=','3')->get();
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
    public function store(ContratoRequest $request)
    {
        $this->repoContrato->saveContratoNew($request);
        return Redirect::to('ContratoVigente');
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
        $cat = $this->repoContrato->getCategoriaContrato($id);
        return view('contrato.show',compact('contrato','cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $CCon = $this->repoContrato->getCategoriaContrato($id);

        $contrato=CE_Contrato::findOrFail($id);
        $amb=DB::table('ambito')->get();
        $pa=DB::table('pais')->get();
        $es=DB::table('estado')->where('idestado','!=','3')->get();
        $cat = $this->repoContrato->getCategoria(2);
        $files = $this->repoContrato->getFilesContratoById($id);
        return view('contrato.edit', compact('contrato','amb','pa','es','CCon','cat','files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContratoRequest $request, $id)
    {
        $contrato = CE_Contrato::findOrFail($id);
        $contrato->titulo=$request->titulo;
        $contrato->codigo=$request->codigo;
        $contrato->objeto=$request->objeto;
        $contrato->duracion=$request->duracion;
        $contrato->fecha_inicio=$request->fecha_inicio;
        $contrato->fecha_fin=$request->fecha_fin;
        $contrato->ambito_idambito=$request->idambito;
        $contrato->pais_idpais=$request->idpais;
        $contrato->estado_idestado=$request->idestado;
        $this->repoContrato->saveCategoriaContrato($request->categoria,$id);
        $contrato->update();
        return Redirect::to('ContratoVigente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

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
        $this->repoContrato->saveFilePathJSON(($request['idContrato'] != null)?$request['idContrato']:null,$filename,$exten,$filenameOrigi);
        return $filename;

    }

    public function verImgContrato($id)
    {
        $contrato=CE_Contrato::findOrFail($id);
        $files = $this->repoContrato->getFilesContratoById($id);
        return view('contrato.img', compact('contrato', 'files'));
    }

    public function deleteFileContrato(Request $request){
        if($request['image'] != null){
            $this->repoContrato->deleteFileByImagen($request['image']);
            $meto = unlink(public_path() . '/Files/'.$request['image']);

        }else{
            $file_name = $request['file_name'];
            $file = $this->repoContrato->deleteFile($file_name);
            $meto = unlink(public_path() . '/Files/'.$file);

        }

        return response()->json($meto);
    }
    public function elicontrato($idcontrato)
    {
        $contrato=CE_Contrato::findOrFail($idcontrato);
        $contrato->estado_idestado='2';
        $contrato->update();
        return Redirect::to('ContratoVigente');
    }

    public function excelContratos(Request $request)
    {

        Excel::create('contrato', function ($excel) use ($request) {
            $excel->sheet('Contratos', function ($sheet) use ($request) {
                $sheet->cell(1,function ($cell){$cell->setBackground('#FE2E64');});
                $fild = $this->verificFilsContrato($request);
                $sql = 'SELECT '.$fild.
                    ' FROM contrato c,pais p,estado e,ambito a'.
                    ' where c.ambito_idambito = a.idambito'.
                    ' and c.pais_idpais = p.idpais'.
                    ' and c.estado_idestado = e.idestado';
                $data = array();
                $results =  DB::select($sql);
                foreach ($results as $result) {
                    $data[] = (array)$result;
                }
                $sheet->fromArray($data);
            });


        })->export('xls');

    }
    public function verificFilsContrato($request){
        $filds = '';
        ($request["titulo_con"]== 'on')?$filds .="c.titulo,":null;
        ($request["Codigo_con"]== 'on')?$filds .="c.codigo,":null;
        ($request["Objeto_con"]== 'on')?$filds .='c.objeto,':null;
        ($request["Duracion_con"]== 'on')?$filds .='c.duracion,':null;
        ($request["Fechaini_con"]== 'on')?$filds .='c.fecha_inicio,':null;
        ($request["fecchafinal_con"]== 'on')?$filds .='c.fecha_fin,':null;
        ($request["Ambito_con"]== 'on')?$filds .='a.nombre ambito,':null;
        ($request["Pais_con"]== 'on')?$filds .='p.nombre pais,':null;
        ($request["Estado_con"]== 'on')?$filds .='e.nombre estado,':null;

        $filds.=',,';
        $resul = explode(',,,',$filds);
        return $resul[0];
    }
}
