<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_CategoriaContrato extends Model
{
    protected $table = 'contrato_has_categoria';
    public $timestamps  = false ;

    public function Categoria(){
        return $this->belongsTo('App\CE_Categoria','categoria_idcategoria');
    }
    public function Contrato(){
        return $this->belongsTo('App\CE_Contrato','contrato_idcontrato');
    }
}
