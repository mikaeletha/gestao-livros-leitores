<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' =>             'required|string|max:255',
            'genero' =>           'required|string|max:255',
            'autor' =>            'required|string|max:255',
            'ano' =>              'required|integer|max:255',
            'paginas' =>          'required|integer|max:255',
            'idioma' =>           'required|string|max:255',
            'edicao' =>           'required|integer|max:255',
            'editora_nome' =>     'required|string|max:255',
            'editora_codigo' =>   'required|integer|max:255',
            'editora_telefone' => 'required|integer|max:255',
            'isbn' =>             'required|integer|max:255',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
