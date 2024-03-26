<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RegisterRequest extends FormRequest
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
            'name'=> 'required',
            'email'=> 'required|email:filter',
            'password'=> 'required',
            'current_password' => 'required |same:password',
        ];
    }

    public function withValidator($validator)
    {
        $currentPassword = $this->current_password;
        $user = $this->user();

        if (empty($currentPassword) || empty($user) || empty($user->password)) {
            // Handle the case where current password or user data is missing
            $validator->errors()->add('current_password', 'Mật khẩu không hợp lệ.');
            return;
        }

        if (!Hash::check($currentPassword, $user->password)) {
            $validator->errors()->add('current_password', 'Mật khẩu không trùng khớp.');
        }
    }

    public function messages()
    {
        return[
            'name.required' => 'Vui lòng nhập họ và tên',
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'current_password.required' => 'Vui lòng nhập lại mật khẩu',
        ];
    }
}
