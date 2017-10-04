<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_Pais extends Model
{
    protected $table = 'pais';

	protected $primaryKey = 'idpais';

	public $timestamps  = false ;
	
    protected $fillable = [
    	'nombre'
    ];
    public function convenios(){
    	return $this->hasMany('App\CE_Convenio');
    }
}
