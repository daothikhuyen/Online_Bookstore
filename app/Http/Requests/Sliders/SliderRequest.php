<?php

namespace App\Http\Requests\Sliders;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'url' => 'required',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên slilder',
            'url.required' => 'Vui lòng nhập đường dẫn',
            'image.required'=> 'Vui lòng chọn ảnh cho slider'
        ];
    }
}
