<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvenioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'=>'required|min:1|max:240',
            'codigo'=>'required|min:1|max:240',
            'objetivo'=>'required|min:1|max:240',
            'duracion'=>'required|min:1|max:240',
            'fecha_inicio'=>'required|min:1|max:240',
            'fecha_final'=>'required|min:1|max:240',
            'categoria'=>'required|min:1|max:240',
            'idtipo'=>'required|min:1|max:240',
            'idpais'=>'required|min:1|max:240',
            'idestado'=>'required|min:1|max:240',
            'num_resolucion'=>'required|min:1|max:240',
            'num_registro'=>'required|min:1|max:240',
            'ambito'=>'required|min:1|max:240',
            'nombre_ins'=>'required|min:1|max:240',
            'sector'=>'required|min:1|max:240',
            'direccion'=>'required|min:1|max:240',
            'nombre_coor' =>'required|min:1|max:240',
            'telefono_coor'=>'required|min:1|max:240',
            'email_coor'=>'required|min:1|max:240',
            'nom_area'=>'required|min:1|max:240',
            'coor_area' =>'required|min:1|max:240',
            'telefono'=>'required|min:1|max:240',
            'email'=>'required|min:1|max:240',
        ];
    }
}
