<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateQuestaoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'uc_id'=>'required|integer',
            'tema_id'=>'required|integer',
            'tipoq'=>'required|string',
            'questao'=>'required|string|max:100|min:5',
            'resposta'=>'required|string|max:255|min:5',
            'pontuacao_questao'=>'required|integer'
        ];
    }
}
