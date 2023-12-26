<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|unique:users|email|string',
            'name' => 'required|string',
            'user_catelogue_id' => 'required|integer|gt:0',
            'password' => 'required|string',
            're_password' => 'required|string|same:password',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Bạn chưa nhập email!',
            'email.email' => 'Email không đúng định dạng. Ví dụ: example@example.com',
            'email.unique' => 'Email đã tồn tại',
            'name.required' => 'Tên không được để trống',
            'user_catelogue_id' => 'Bạn chưa chọn nhóm thành viên',
            'password.required' => 'Bạn chưa nhập mật khẩu!',
            're_password.required' => 'Bạn chưa nhập lại mật khẩu',
            're_password.same' => 'Mật khẩu không khớp!',
        ];
    }
}
