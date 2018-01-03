<?php

namespace App\Http\Controllers;

use App\CE_Convenio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\CE_Responsable;
use App\Repository\ResponsableRepo;
use App\CE_ResponsableConvenio;
use DB;

use Maatwebsite\Excel\Facades\Excel;

class ResponsableController extends Controller
{
    protected $repoConRes;
    public function __construct(ResponsableRepo $repoc)
    {
        $this->repoConRes = $repoc;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $responsable=DB::table('responsable as re')
        ->select('re.idresponsable','re.nombre','re.descripcion','re.correo')
        ->orderBy('idresponsable','DES')->paginate();

        return view('responsables.index',compact('responsable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $es=DB::table('estado')->get();  

        return view('responsables.create',compact('es'));

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre'=>'required|min:4|max:120',
            
            ]);
        
        $responsable=new CE_Responsable;
        $responsable->idresponsable=$request->idresponsable;
        $responsable->nombre=$request->nombre;
        $responsable->descripcion=$request->descripcion;
        $responsable->correo=$request->correo;
        $responsable->save();

        return Redirect::to('responsables');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$responsable=DB::table('responsable as re')
            ->join('convenio_has_responsable as cr','re.idresponsable','=','cr.responsable_idresponsable')
            ->join('')
            ->select('re.idresponsable','re.nombre','cr.convenio_idconvenio as idconvenio')
            ->paginate();*/
        $res=CE_Responsable::find($id);
        $RCon = $this->repoConRes->getConvenioRes($id);

        return view('responsables.show',compact('RCon','res'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $responsable=CE_Responsable::findOrFail($id);
        $estado=DB::table('estado')->get();
        return view('responsables.edit', compact('responsable','estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre'=>'required|min:4|max:120',
            ]);
        $responsable = CE_Responsable::findOrFail($id);
       
        $responsable->nombre=$request->nombre;
        $responsable->descripcion=$request->descripcion;
        $responsable->correo=$request->correo;
        $responsable->update();

        return Redirect::to('responsables');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responsable=CE_Responsable::findOrFail($id);
        $responsable->estado_idestado='3';
        $responsable->update();
        return Redirect::to('responsables');
    }
    public function Eliminar($id)
    {
        $responsable=CE_Responsable::findOrFail($id);
        $responsable->estado_idestado='3';
        $responsable->update();
        return Redirect::to('responsables');
    }

    public function excelResponsable($id)
    {
        Excel::create('Responsables', function ($excel) use ($id)  {
            $excel->sheet('Convenios', function ($sheet) use ($id) {
                $sheet->cell(1, function ($cell) {
                    $cell->setBackground('#FE2E64');
                });
                /*$sql11=CE_Convenio::select('idconvenio')
                ->join('convenio_has_responsable as cr','cr.convenio_idconvenio','=','convenio.idconvenio')
                ->where('cr.responsable_idresponsable','=',$id)->get();
                $sql = 'SELECT '.
                    ' FROM convenio_has_responsable cr,convenio c'.
                    ' where cr.responsable_idresponsable ='.$id.
                    ' and cr.convenio_idconvenio = c.idconvenio';

                $sql2='select* from convenio_has_responsable where responsable_idresponsable ='.$id;*/
                $sql6='SELECT c.nombre, c.titulo,c.codigo,c.resolucion,c.objetivo,c.duracion,c.fecha_ini as fecha_inicio,
                c.fecha_fin as fecha_final,t.nombre tipo,amb.nombre ambito,pa.nombre pais,es.nombre estado
                      FROM convenio c 
                      JOIN convenio_has_responsable cr ON c.idconvenio = cr.convenio_idconvenio
                      JOIN tipo t ON c.tipo_idtipo = t.idtipo
                      JOIN ambito amb ON c.ambito_idambito = amb.idambito
                      JOIN pais pa ON c.pais_idpais = pa.idpais
                      JOIN estado es ON c.estado_idestado = es.idestado
                      WHERE cr.responsable_idresponsable='.$id;

                /*$sql4= 'SELECT '.
                    ' FROM convenio c,ficha f,pais p,estado e,ambito a,tipo t'.
                    ' where c.idconvenio = f.convenio_idconvenio'.
                    ' and c.tipo_idtipo = t.idtipo'.
                    ' and c.ambito_idambito = a.idambito'.
                    ' and c.pais_idpais = p.idpais'.
                    ' and c.estado_idestado = e.idestado';
                $sql20= 'SELECT c.nombre'.
                    'FROM convenio c, convenio_has_responsable cr'.
                    'WHERE cr.responsable_idresponsable ='.$id;*/

                $data = array();
                $results =  DB::select($sql6);

                foreach ($results as $result) {
                    $data[] = (array)$result;
                }

                $sheet->fromArray($data);
            });


        })->export('xls');
    }
}
