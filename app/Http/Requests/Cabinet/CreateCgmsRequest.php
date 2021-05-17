<?php

namespace App\Http\Requests\Cabinet;

use Illuminate\Foundation\Http\FormRequest;

class CreateCgmsRequest extends FormRequest
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
            'temperature' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'temperature.required' => 'Это поле надо обязательно заполнить',
            'temperature.numeric' => 'Это поле должно быть численным',
        ];

    }
}
