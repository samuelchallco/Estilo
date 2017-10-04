<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_Rol extends Model
{
    protected $table = 'rol';

	protected $primaryKey = 'idrol';

	public $timestamps  = false ;
	
    protected $fillable = [
    	'tipo'
    ];
    public function usuarios(){
    	return $this->hasMany('App\CE_Usuario');
    }
}
