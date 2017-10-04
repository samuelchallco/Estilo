<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_Estado extends Model
{
    protected $table = 'estado';

	protected $primaryKey = 'idestado';

	public $timestamps  = false ;
	
    protected $fillable = [
    	'nombre'
    ];

    public function convenios(){
    	return $this->hasMany('App\CE_Convenio');
    }
    public function convenio(){
    	return $this->hasMany('App\CE_Convenio');
    }
}
