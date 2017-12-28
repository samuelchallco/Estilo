<?php

namespace App\Http\Controllers;

use App\CE_Contrato;
use App\CE_Convenio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total=CE_Convenio::where('estado_idestado','=','1')->get()->count();
        $total2=CE_Convenio::where('estado_idestado','=','2')->get()->count();
        $total3=CE_Convenio::where('estado_idestado','=','3')->get()->count();
        $cont1=CE_Contrato::where('estado_idestado','=','1')->get()->count();
        $cont2=CE_Contrato::where('estado_idestado','=','2')->get()->count();
        return view('home',compact('total','total2','total3','cont1','cont2'));
    }
}
