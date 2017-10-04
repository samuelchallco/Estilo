<?php

namespace App\Http\Controllers;

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
            	$convenios = CE_Convenio::select('titulo','codigo','imagen','pais_idpais as nom')
            	->where('pais_idpais','=','3')
            	->get();
                $sheet->fromArray($convenios);


            });


        })->export('xls');

    }
}
