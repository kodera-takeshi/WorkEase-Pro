<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSignupRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                'unique:admins',
            ],
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute は必須です。',
            'email' => ':attribute はメールアドレス形式である必要があります。',
            'unique' => 'すでに登録済みのユーザーです。',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }
}
