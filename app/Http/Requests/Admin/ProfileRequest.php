<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            "email"=>['required','email'],
            "name"=>['required']
        ];
    }

    public function messages(){
        return [
            'email.required'=>"E-Posta Alanı Zorunludur.",
            'email.email'=>"E-Posta Formata Uygun Değildir.",
            'name.required'=>"İsim Alanı Zorunludur."
        ];
    }
}
