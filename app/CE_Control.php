<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_Control extends Model
{
    protected $table = 'convenio_has_responsable';

	protected $primaryKey = 'idcontrol';

	public $timestamps  = false ;
	
    protected $fillable = [
    	'convenio_idconvenio','responsable_idresponsable','usuario_idusuario','descripcion'
    	

    ];
    public function control(){
    	return $this->hasMany('App\CE_Control');
    }
}
