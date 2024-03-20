<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmpresaRequest extends FormRequest
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
            'nombre' => 'required|string|max:255|unique:empresas,nombre,' . $this->empresa->id,
            'email' => 'nullable|email|max:255|',
            'telefono' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'sitio_web' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la empresa es requerido',
            'nombre.string' => 'El nombre de la empresa debe ser un texto',
            'nombre.max' => 'El nombre de la empresa no debe exceder los 255 caracteres',
            'nombre.unique' => 'El nombre de la empresa ya existe',
            'email.email' => 'El email debe ser un correo electrónico',
            'email.max' => 'El email no debe exceder los 255 caracteres',
            'telefono.string' => 'El teléfono debe ser un texto',
            'telefono.max' => 'El teléfono no debe exceder los 255 caracteres',
            'direccion.string' => 'La dirección debe ser un texto',
            'direccion.max' => 'La dirección no debe exceder los 255 caracteres',
            'sitio_web.string' => 'El sitio web debe ser un texto',
            'sitio_web.max' => 'El sitio web no debe exceder los 255 caracteres',
            'logo.image' => 'El logo debe ser una imagen',
            'logo.max' => 'El logo no debe exceder los 2048 kilobytes',
        ];
    }
}
