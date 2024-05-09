<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
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
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ];
    }
    public function messages()
    {
        return [
            'current_password.required' => 'Mevcut şifre alanı zorunludur.',
            'new_password.required' => 'Yeni şifre alanı zorunludur.',
            'new_password.min' => 'Yeni şifre en az :min karakter olmalıdır.',
            'confirm_password.required' => 'Yeni şifre tekrar alanı zorunludur.',
            'confirm_password.same' => 'Yeni şifre ve yeni şifre tekrar alanları eşleşmelidir.',
        ];
    }
}
