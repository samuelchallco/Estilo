<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_tipo extends Model
{
    protected $table = 'tipo';

	protected $primaryKey = 'idtipo';

	public $timestamps  = false ;
	
    protected $fillable = [
    	'nombre'
    ];
    public function convenios(){
    	return $this->hasMany('App\CE_Convenios');
    }
}
