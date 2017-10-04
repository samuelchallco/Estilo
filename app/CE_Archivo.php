<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_Archivo extends Model
{
    protected $table = 'archivo';

	protected $primaryKey = 'idarchivo';

	public $timestamps  = false ;
	
    protected $fillable = [
    	'nombre','imagen','convenio_idconvenio'
    ];

    public function convenio(){
    	return $this->hasOne('App\CE_Convenio');
    }
}
