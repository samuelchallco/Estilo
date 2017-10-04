<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_Responsable extends Model
{
    protected $table = 'responsable';

	protected $primaryKey = 'idresponsable';

	public $timestamps  = false ;
	
    protected $fillable = [
    	'nombre','descripcion','estado_idestado'
    	

    ];
    public function control(){
    	return $this->hasMany('App\CE_Control');
    }
}
