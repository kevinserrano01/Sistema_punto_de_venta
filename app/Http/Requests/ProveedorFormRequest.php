<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre'=>'required|max:50',
            'tipo_documento'=>'max:50',
            'nro_documento'=>'max:50',
            'direccion'=>'max:250',
            'telefono'=>'max:10',
            'email'=>'max:50'
        ];
    }
}
