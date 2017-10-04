<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_TipoConvenio extends Model
{
    protected $table = 'tipoconvenio';

	protected $primaryKey = 'idtipoconvenio';

	public $timestamps  = false ;
	
    protected $fillable = [
    	'nombre'
    ];
    public function convenios(){
    	return $this->hasMany('App\CE_Convenios');
    }
}
