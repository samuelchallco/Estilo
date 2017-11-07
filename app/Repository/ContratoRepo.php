<?php
/**
 * Created by PhpStorm.
 * User: MARIBEL
 * Date: 30/10/2017
 * Time: 12:02 PM
 */

namespace App\Repository;


use App\CE_CategoriaContrato;
use App\CE_Contrato;
use App\CE_Archivo;
use App\CE_Categoria;
use App\CE_Estado;


class ContratoRepo
{
    protected $modelcontrato;
    protected $modelarchivo;
    protected $modelestado;
    protected $modelcategory;
    protected $modelcat_contrato;

    public function __construct(CE_Contrato $contrato, CE_Archivo $archivo, CE_Estado $estado, CE_Categoria $categoria,CE_CategoriaContrato $catcontrato)
    {
        $this->modelcontrato = $contrato;
        $this->modelarchivo = $archivo;
        $this->modelestado = $estado;
        $this->modelcategory = $categoria;
        $this->modelcat_contrato = $catcontrato;
    }

    public function saveFilePathJSON($id,$file,$extencion,$name){

        $model = new $this->modelarchivo;
        $model->imagen = $file;
        $model->contrato_idcontrato = $id;
        $model->extencion = $extencion;
        $model->filename = $name;
        $model->patch = '/Files/';
        $model->save();
        return $model->imagen;
    }

    public function deleteFile($file){
        $model = $this->modelarchivo->where('filename',$file)->first();
        $model->delete();
        return $model->imagen;
    }

    public function getFilesContratoById($id){
        return $this->modelarchivo->where('contrato_idcontrato',$id)->get();
    }

    public function getEstadosContrato(){
        return $this->modelestado->get();
    }

    public function getTypeContrato($idEstado){
        $con = $this->modelcontrato->where('estado_idestado',$idEstado)->orderBy('idcontrato','ASC')->paginate();
        foreach ($con as $co){
            $co->Tipo;
            $co->Ambito;
        }
        return $con;
    }

    public function getContratoById($id){
        $con = $this->modelcontrato->where('idcontrato',$id)->get();
        foreach ($con as $co){
            $co->Tipo;
            $co->Ambito;
            $co->Pais;
            $co->Estado;
        }
        return $con[0];

    }

    public function getCategoria($tipo){
        return $this->modelcategory->whereTipo($tipo)->get();
    }

    public function saveContratoNew($request){

        $con = $this->saveContrato($request);
        $this->saveCategoriaContrato($request['categoria'],$con->idcontrato);
        $this->saveFilesContrato($request['files'],$con->idcontrato);
        return $con;
    }

    public function saveContrato($request){
        $contrato = new $this->modelcontrato;
        $contrato->titulo=$request->titulo;
        $contrato->codigo=$request->codigo;
        $contrato->objeto=$request->objeto;
        $contrato->duracion=$request->duracion;
        $contrato->fecha_inicio=$request->fecha_inicio;
        $contrato->fecha_fin=$request->fecha_final;
        $contrato->ambito_idambito=$request->idambito;
        $contrato->pais_idpais=$request->idpais;
        $contrato->estado_idestado=$request->idestado;
        $contrato->save();
        return $contrato;
    }

    public function saveCategoriaContrato($categorias,$idContrato){
        foreach ($categorias as $key => $val){
            $catcon = new $this->modelcat_contrato;
            $catcon->categoria_idcategoria = $categorias[$key];
            $catcon->contrato_idcontrato =$idContrato;
            $catcon->save();
        }

        return $catcon;
    }

    public function saveFilesContrato($files,$idContrato){
        foreach ($files as $k=>$val){
            $file = $this->modelarchivo->where('imagen',$files[$k])->first();
            if($file != null){
                $file->state = 1;
                $file->contrato_idcontrato=$idContrato;
                $file->save();
            }
        }
    }

}