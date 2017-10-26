<?php

namespace App\Repository;


use App\CE_Archivo;
use App\CE_Categoria;
use App\CE_Convenio;
use App\CE_Estado;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\toJSON;

class ConvenioRepo
{
    protected $modelconvenio;
    protected $modelarchivo;
    protected $modelestado;
    protected $modelcategory;

    public function __construct(CE_Convenio $convenio , CE_Archivo $archivo, CE_Estado $estado,CE_Categoria $categoria)
    {
        $this->modelconvenio = $convenio;
        $this->modelarchivo = $archivo;
        $this->modelestado = $estado;
        $this->modelcategory = $categoria;
    }

    public function saveFilePathJSON($id,$file,$extencion){

        $model = new $this->modelarchivo;
           $data ='/Files/'.$file;
           $model->imagen = $data;
           $model->convenio_idconvenio = $id;
           $model->extencion = $extencion;
           $model->save();
       return $model->imagen;
    }

    public function getFilesConvenioById($id){
       return $this->modelarchivo->where('convenio_idconvenio',$id)->get();
    }

    public function getEstadosConvenio(){
       return $this->modelestado->get();
    }


    public function getTypeCovenio($idEstado){
      $con = $this->modelconvenio->where('estado_idestado',$idEstado)->orderBy('idconvenio','ASC')->paginate();
      foreach ($con as $co){
          $co->Tipo;
          $co->Ambito;
      }
      return $con;
    }

    public function getConveioById($id){
         $con = $this->modelconvenio->findOrFail($id)->get();
         foreach ($con as $co){
             $co->Tipo;
             $co->Ambito;
             $co->Pais;
             $co->Estado;
         }
         return $con[0];
    }

    //------------------------------------------

    public function getCategoria($tipo){
        return $this->modelcategory->whereTipo($tipo)->get();
    }


}