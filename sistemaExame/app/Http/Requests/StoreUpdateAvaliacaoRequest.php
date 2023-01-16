<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAvaliacaoRequest extends FormRequest
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
            'tipoa'=>'required|string',
            'uc_id'=>'required|integer',
            'data'=>'required',
            'hora'=>'required',
            'duracao'=>'required|integer',
            'pontuacao'=>'required|integer',
            'pontuacao_min'=>'required|integer',
            'qtidade_questoes'=>'required|integer'



        ];
    }
}
