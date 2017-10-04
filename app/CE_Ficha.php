<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_Ficha extends Model
{
    protected $table = 'ficha';

	protected $primaryKey = 'idficha';

	public $timestamps  = false ;
	
    protected $fillable = [
    	'nombre','convenio_idconvenio'
    ];

    public function convenio(){
    	return $this->hasOne('App\CE_Convenio');
    }

}
