<?php

namespace App\Http\Controllers;

use App\CE_Ambito;
use App\CE_Pais;
use Illuminate\Http\Request;
use App\CE_Convenio;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ExcelController extends Controller
{

	public function excelConvenios(Request $request)
    {

         Excel::create('convenio', function ($excel) use ($request) {
              $excel->sheet('Convenios', function ($sheet) use ($request) {
                  $sheet->cell(1,function ($cell){$cell->setBackground('#FE2E64');});
                  $fild = $this->verificFils($request);
                  $sql = 'SELECT '.$fild.
                      ' FROM convenio c,ficha f,pais p,estado e,ambito a,tipo t'.
                      ' where c.idconvenio = f.convenio_idconvenio'.
                      ' and c.tipo_idtipo = t.idtipo'.
                      ' and c.ambito_idambito = a.idambito'.
                      ' and c.pais_idpais = p.idpais'.
                      ' and c.estado_idestado = e.idestado';
                  $data = array();
                  $results =  DB::select($sql);
                  foreach ($results as $result) {
                      $data[] = (array)$result;
                  }
                  $sheet->fromArray($data);
              });


          })->export('xls');



    }

    public function verificFils($request){
	    $filds = '';
        ($request["Titulo_c"]== 'on')?$filds .="c.titulo,":null;
        ($request["Codigo_c"]== 'on')?$filds .="c.codigo,":null;
        ($request["Resolucion_c"]== 'on')?$filds .='c.resolucion,':null;
        ($request["Objetivo_c"]== 'on')?$filds .='c.objetivo,':null;
        ($request["Duraion_c"]== 'on')?$filds .='c.duracion,':null;
        ($request["Fechaini_c"]== 'on')?$filds .='c.fecha_ini,':null;
        ($request["fecchafinal_c"]== 'on')?$filds .='c.fecha_fin,':null;
        ($request["tipo_c"]== 'on')?$filds .='t.nombre tipo,':null;
        ($request["Ambito_c"]== 'on')?$filds .='a.nombre ambito,':null;
        ($request["Pais_c"]== 'on')?$filds .='p.nombre pais,':null;
        ($request["Estado_c"]== 'on')?$filds .='e.nombre estado,':null;

        ($request["Nresolucion_f"]== 'on')?$filds .='f.num_resolucion,':null;
        ($request["Nregistro_f"]== 'on')?$filds .='f.num_registro,':null;
        ($request["Direcion_f"]== 'on')?$filds .='f.direccion,':null;
        ($request["telefono_f"]== 'on')?$filds .='f.telefono,':null;
        ($request["telcord_f"]== 'on')?$filds .='f.telefono_coor,':null;
        ($request["EmailCod_f"]== 'on')?$filds .='f.email_coor,':null;
        ($request["CordArea_f"]== 'on')?$filds .='f.coor_area,':null;
        ($request["email_f"]== 'on')?$filds .='f.email,':null;
        $filds.=',,';
        $resul = explode(',,,',$filds);
        return $resul[0];
    }
}
