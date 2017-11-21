<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_CategoriaConvenio extends Model
{
    protected $table = 'categoria_has_convenio';
    public $timestamps  = false ;

    public function Categoria(){
        return $this->belongsTo('App\CE_Categoria','categoria_idcategoria');
    }
    public function Convenio(){
        return $this->belongsTo('App\CE_Convenio','convenio_idconvenio');
    }
}
