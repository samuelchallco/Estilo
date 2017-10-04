<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_Usuario extends Model
{
    protected $table = 'usuario';

	protected $primaryKey = 'idusuario';

	public $timestamps  = false ;
	
    /* protected $fillable = [
    	'nombre','corro','password','rol_idrol','estado_idestado'
    ]; */

    public function rol(){
    	return $this->hasOne('App\CE_Rol');
    }
}
