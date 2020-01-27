<?php

namespace sisVentas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloFormRequest extends FormRequest
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
     * Get the validation rules that apply to the request. mimes:jpg,jpeg,png|max:5000
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idcategoria'=>'required',
            'codigo'=>'max:50',
            'nombre'=>'required|max:100',
            'stock'=>'required|numeric',
            'descripcion'=>'max:512',
            'imagen'=> 'mimes:jpg,jpeg,png|max:100',
        ];
    }
}
