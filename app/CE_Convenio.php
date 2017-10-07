<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_Convenio extends Model
{
	protected $table = 'convenio';

	protected $primaryKey = 'idconvenio';

	public $timestamps  = false ;
	
    protected $fillable = [
    	'titulo','codigo',
    	'resolucion','objetivo','duracion',
    	'categoria','fecha_ini','fecha_fin','imagen',
        'tipo_idtipo',
        'tipoconvenio_idtipoconvenio',
        'ambito_idambito','pais_idpais',
        'estado_idestado','ficha_idficha'
    ];

    public function control(){
        return $this->hasMany('App\CE_Control');
    }
    public function ambito(){
        return $this->hasOne('App\CE_Ambito');
    }
    public function estado(){
        return $this->hasOne('App\CE_Estado');
    }
    public function ficha(){
        return $this->hasOne('App\CE_Ficha');
    }
    public function pais(){
        return $this->hasOne('App\CE_Pais');
    }
    public function tipo(){
        return $this->hasOne('App\CE_Tipo');
    }
    public function tipoconvenio(){
        return $this->hasOne('App\CE_TipoConvenio');
    }
    public function archivos(){
        return $this->hasMany('App\CE_Archivo','convenio_idconvenio');
    }
}
