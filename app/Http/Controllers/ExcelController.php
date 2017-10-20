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
	public function excelConvenios()
    {


        Excel::create('convenio', function ($excel) {

            $excel->sheet('Convenios', function ($sheet) {
            	

            	$sheet->cell(1,function ($cell){
					
            		$cell->setBackground('#FE2E64');
					
            	});

            	$convenios = CE_Convenio::select('titulo','codigo','imagen','pais_idpais','ambito_idambito')
                ->get();



            	foreach($convenios as $con){
                    $pais=CE_Pais::find($con->pais_idpais);
                    $amb=CE_Ambito::find($con->ambito_idambito);
                    $con->pais_idpais=$pais->nombre;
                    $con->ambito_idambito=$amb->nombre;
                }



            	/*->where('pais_idpais','=','3')*/

                $sheet->fromArray($convenios);


            });


        })->export('xls');

    }
}
