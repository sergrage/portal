<?php

namespace App\Http\Requests\Year;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'cgms' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'cgms.required' => 'Это поле надо обязательно заполнить',
            'cgms.numeric' => 'Это поле должно быть численным',
        ];

    }
}
