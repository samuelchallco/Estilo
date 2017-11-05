<?php
/**
 * Created by PhpStorm.
 * User: MARIBEL
 * Date: 30/10/2017
 * Time: 12:02 PM
 */

namespace App\Repository;


use App\CE_Contrato;

class ContratoRepo
{
    protected $modelcontrato;
    public function __construct(CE_Contrato $contrato)
    {
        $this->modelcontrato = $contrato;
    }

    public function getContrato(){
        $con = $this->modelcontrato->orderBy('idcontrato','ASC')->paginate();
        foreach ($con as $co){
            $co->Tipo;
            $co->Ambito;
        }
        return $con;

    }

}