<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class CE_Usuario extends Model implements AuthenticatableContract {

    use Authenticatable;
    protected $table = 'usuario';
	protected $primaryKey = 'idusuario';

    public function rol(){
    	return $this->hasOne('App\CE_Rol');
    }
}
