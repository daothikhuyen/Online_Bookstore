<?php

namespace App\Http\Requests\Menus;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'name' => 'required',
            'parent_id'=> 'required',
            'description'=>'required',
            'content'=>'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' =>'Vui lòng nhập tên danh mục',
            'description.required'=> 'Vui lòng nhập mô tả',
            'content.required'=>'Vui lòng nhập mô tả chi tiết'
        ];
    }
}
