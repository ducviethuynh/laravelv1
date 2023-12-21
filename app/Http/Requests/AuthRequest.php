<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Bạn chưa nhập email! 😠',
            'email.email' => 'Email không đúng định dạng. Ví dụ: example@example.com',
            'password.required' => 'Bạn chưa nhập mật khẩu! 😠',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
        ];
    }
}
