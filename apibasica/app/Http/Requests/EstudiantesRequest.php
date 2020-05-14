<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EstudiantesRequest extends FormRequest
{

    /**
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }

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
            'nombre' => 'required|max:50',
            'edad' => 'numeric|nullable',
            'docente_id' => 'required|nullable|numeric'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'el nombre es requerido',
            'nombre.max' =>'El nombre del estudiante no puede ser mayor a :max caracteres.',
            'edad.numeric'  => 'la edad debe ser un numero',
            'docente_id.numeric' => 'Este campo debe ser un numero',
            'docente_id.required' => 'el docente es requerido',
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'nombre del producto',
            'edad' => 'edad del estudiante',
        ];
    }


}
