<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {

        return [
            'type_category' => 'required',
            'name' => 'required|unique:categories,name,',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'type_category.required' => 'O tipo da categoria é obrigatório',
            'name.required' => 'O nome da categoria é obrigatório',
            'name.unique' => 'Esta categoria já existe',
            'description.required' => 'A descrição da categoria é obrigatória',
        ];
    }
}
