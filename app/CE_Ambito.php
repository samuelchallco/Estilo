<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_Ambito extends Model
{
    protected $table = 'ambito';

	protected $primaryKey = 'idambito';

	public $timestamps  = false ;
	
    protected $fillable = [
    	'nombre'
    ];

    public function convenios(){
    	return $this->hasMany('App\CE_Convenio');
    }
}
