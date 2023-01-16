<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUcRequest extends FormRequest
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
            'nomeu'=>'required|string|max:100|min:2',
            'qcreditos'=>'required|integer|max:10|min:5',
            'carga_horaria'=>'required|integer|max:120|min:30',
            'qprovas'=>'required|integer|max:2'
        ];
    }
}
