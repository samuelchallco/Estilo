<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_Contrato extends Model
{
    protected $table = 'contrato';

    protected $primaryKey = 'idcontrato';

    public $timestamps  = false ;



    public function Ambito(){
        return $this->belongsTo('App\CE_Ambito','ambito_idambito');
    }

    public function Tipo(){
        return $this->belongsTo('App\CE_Tipo','tipo_idtipo');
    }

    public function Pais(){
        return $this->belongsTo('App\CE_Pais','pais_idpais');
    }

    public function Estado(){
        return $this->belongsTo('App\CE_Estado','estado_idestado');
    }

}
