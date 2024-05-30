<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSupport extends FormRequest
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
        $rules = [
            'subject' => [
                'required',
                'min:3',
                'max:255',
                'unique:supports'
            ],
            'body' => [
                'required',
                'min:3',
                'max:10000'
            ]
        ];

        if($this->method() === 'PUT' || $this->method() === 'PATCH') {

            $id = $this->support ?? $this->id;

            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                // há uma excessão quando o $id enviado para a rota
                // é igual ao id da coluna "id"
                // "unique:supports,subject,{$this->id},id"
                Rule::unique('supports')->ignore($id)
            ];
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            // subject
            'subject.required' => 'O assunto é obrigatório',
            'subject.min' => 'O assunto deve ter 3 ou mais caracteres',
            'subject.max' => 'O assunto deve ter no máximo 255 caracteres',
            'subject.unique' => 'O assunto já existe',
            // body
            'body.required' => 'A descrição é obrigatória',
            'body.min' => 'A descrição deve ter 3 ou mais caracteres',
            'body.max' => 'A descrição deve ter no máximo 255 caracteres',
        ];
    }
}
