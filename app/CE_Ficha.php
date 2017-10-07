<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_Ficha extends Model
{
    protected $table = 'ficha';

	protected $primaryKey = 'idficha';

	public $timestamps  = false ;
	
    protected $fillable = [
    	'num_resolucion','num_registro',
        'ambito','nombre_ins','sector',
        'direccion','nombre_coor','telefono_coor',
        'email_coor','nom_area','coor_area','telefono',
        'email'
    ];

    public function convenio(){
    	return $this->hasOne('App\CE_Convenio');
    }

}
