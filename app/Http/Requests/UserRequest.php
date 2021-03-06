<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        if ($this->isMethod('PUT')) {
            return [
                'User_nivelAcesso'  => 'required',
                'User_matricula'    => 'required',
                'User_nome'         => 'required',
                'User_email'        => 'required'
            ];
        }

        return [
            'User_nivelAcesso'  => 'required',
            'User_matricula'    => 'required',
            'User_senha'        => 'required',
            'User_nome'         => 'required',
            'User_email'        => 'required|unique:Users'
        ];
    }

    public function messages()
    {
        return [
            'User_idUsuario.unique'     => 'Usuario já cadastrado no sistema',
            'User_nivelAcesso.required' => 'Necessário informar o nivel de acesso',
            'User_matricula.required'   => 'Necessário informar a matricula',
            'User_matricula.unique'     => 'Numero de matricula já existe',
            'User_senha.required'       => 'Necessário informar a senha',
            'User_nome.required'        => 'Necessário informar o nome',
            'User_email.required'       => 'Necessário informar o email',
            'User_email.unique'         => 'Email já cadastrado no sistema'
        ];
    }
}
