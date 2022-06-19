<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomainRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'name' => 'required|unique:domains',
            'description' => 'required',
            'url' => 'required|url|unique:domains',
            'server_name' => 'required',
            'organization_name' => 'required',
            'email_organization' => 'required|email',
            'phone_organization' => 'required|min:11',
            'category_id' => 'required',
            'expiration_date' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.unique' => 'Este domínio já existe',
            'description.required' => 'O campo descrição é obrigatório',
            'url.required' => 'O campo url é obrigatório',
            'url.unique' => 'Esta URL já existe',
            'server_name.required' => 'O campo servidor é obrigatório',
            'organization_name.required' => 'O campo nome do proprietário é obrigatório',
            'email_organization.required' => 'O campo e-mail é obrigatório',
            'phone_organization.required' => 'O campo telefone é obrigatório',
            'category_id.required' => 'O campo categoria é obrigatório',
            'expiration_date.required' => 'O campo data de expiração é obrigatório',
            'url.url' => 'Deve estar nesse formato https://www.example.domain...',
            'email_organization.email' => 'Deve estar nesse formato name@example.com',
            'phone_organization.min' => 'Deve possuir no mínimo 11 dígitos, sem traços e parênteses incluindo o DDD',
        ];
    }
}
