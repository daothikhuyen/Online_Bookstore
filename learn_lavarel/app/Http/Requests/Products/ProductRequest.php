<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // true mới validate đc
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
            'menu_id'=>'required',
            'description'=>'required',
            'image'=>'required',

        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'menu_id.required'=>'Vui lòng nhập chọn danh mục',
            'description.required'=>'Vui lòng nhập mô tả',
            'image.required'=>'Vui lòng chọn ảnh cho sản phẩm',
        ];
    }
}
