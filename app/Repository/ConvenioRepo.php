<?php

namespace App\Repository;


use App\CE_Archivo;
use App\CE_Categoria;
use App\CE_CategoriaConvenio;
use App\CE_Convenio;
use App\CE_Estado;
use App\CE_Ficha;

class ConvenioRepo
{
    protected $modelconvenio;
    protected $modelarchivo;
    protected $modelestado;
    protected $modelcategory;
    protected $modelficha;
    protected $modelcat_com;

    public function __construct(CE_Convenio $convenio , CE_Archivo $archivo, CE_Estado $estado, CE_Categoria $categoria, CE_Ficha $ficha, CE_CategoriaConvenio $catconvenio)
    {
        $this->modelconvenio = $convenio;
        $this->modelarchivo = $archivo;
        $this->modelestado = $estado;
        $this->modelcategory = $categoria;
        $this->modelficha = $ficha;
        $this->modelcat_com = $catconvenio;
    }

    public function saveFilePathJSON($id,$file,$extencion,$name){

        $model = new $this->modelarchivo;
           $model->imagen = $file;
           $model->convenio_idconvenio = $id;
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

    public function deleteFileByImagen($image){
     $model = $this->modelarchivo->where('imagen',$image)->first();
     $model->delete();
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
         $con = $this->modelconvenio->where('idconvenio',$id)->get();
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
    public function getCategoriaConevnio($id){
       $catcon = $this->modelcat_com->where('convenio_idconvenio',$id)->get();
       foreach ($catcon as $con){
           $con->Categoria;
           $con->Convenio;
       }
       return $catcon;
    }
    public function saveConvenioNew($request){

        $con = $this->saveConvenio($request);
        $this->saveFichero($request,$con->idconvenio);
        if($request['categoria'] != null){
            $this->saveCategoriaConvenio($request['categoria'],$con->idconvenio);

        }
        if($request['files'] != null){
            $this->saveFilesConvenio($request['files'],$con->idconvenio);

        }

       return $con;
    }

    public function saveConvenio($request){
        $convenio = new $this->modelconvenio;
        $convenio->titulo=$request->titulo;
        $convenio->codigo=$request->codigo;
        $convenio->resolucion=$request->resolucion;
        $convenio->objetivo=$request->objetivo;
        $convenio->duracion=$request->duracion;
        $convenio->fecha_ini=$request->fecha_inicio;
        $convenio->fecha_fin=$request->fecha_final;
        $convenio->tipo_idtipo=$request->idtipo;
        $convenio->ambito_idambito=$request->idambito;
        $convenio->pais_idpais=$request->idpais;
        $convenio->estado_idestado=$request->idestado;
        $convenio->save();
        return $convenio;
    }
    public function saveFichero($request,$idConvenio){
        $ficha=new $this->modelficha;
        $ficha->num_resolucion=$request->num_resolucion;
        $ficha->num_registro=$request->num_registro;
        $ficha->ambito=$request->ambito;
        $ficha->nombre_ins=$request->nombre_ins;
        $ficha->sector=$request->sector;
        $ficha->direccion=$request->direccion;
        $ficha->nombre_coor=$request->nombre_coor;
        $ficha->telefono_coor=$request->telefono_coor;
        $ficha->email_coor=$request->email_coor;
        $ficha->nom_area=$request->nom_area;
        $ficha->coor_area=$request->coor_area;
        $ficha->telefono=$request->telefono;
        $ficha->email=$request->email;
        $ficha->convenio_idconvenio=$idConvenio;
        $ficha->save();
        return $ficha;
    }
    public function saveCategoriaConvenio($categorias,$idConvenio){
        $exist = $this->modelcat_com->where('convenio_idconvenio',$idConvenio)->get();
        if($exist != null){
            foreach ($exist as $exi){
                $this->modelcat_com->where('convenio_idconvenio',$idConvenio)
                                            ->where('categoria_idcategoria',$exi->categoria_idcategoria)->delete();
            }
        }
        foreach ($categorias as $key => $val){
              $catcon = new $this->modelcat_com;
              $catcon->categoria_idcategoria = $categorias[$key];
              $catcon->convenio_idconvenio =$idConvenio;
              $catcon->save();
      }

      return null;
    }
    public function saveFilesConvenio($files,$idConvenio){
        foreach ($files as $k=>$val){
            $file = $this->modelarchivo->where('imagen',$files[$k])->first();

            if($file != null) {
                $file->state = 1;
                $file->convenio_idconvenio = $idConvenio;
                $file->save();
            }

        }
    }


}