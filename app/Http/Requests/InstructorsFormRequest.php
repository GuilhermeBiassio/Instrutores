<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorsFormRequest extends FormRequest
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
            'status' => ['required'],
            'motorista' => ['required'],
            'carro' => ['required'], 
            'linha' => ['required'], 
            'inicio_percurso' => ['required'], 
            'final_percurso' => ['required'], 
            'observacoes' => ['required'], 
            'data_instrucao' => ['required']
        ];
    }
}
