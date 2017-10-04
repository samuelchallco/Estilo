<?php

/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 3/10/2017
 * Time: 17:12
 */
namespace App\Repository;
use App\CE_Usuario;

class RegitroRepo
{
    protected $modelCE_Usuario;

    public function __construct(CE_Usuario $usuario){
        $this->modelCE_Usuario = $usuario;
    }

    public function ValidLogin($usuario,$pass){
        $user = $this->modelCE_Usuario->where('nombre',$usuario)
                                       ->where('password',$pass)->count();
       if($user){
           return $this->modelCE_Usuario->where('nombre',$usuario)
               ->where('password',$pass)->get();
       }else{
           return null;
       }

    }


}