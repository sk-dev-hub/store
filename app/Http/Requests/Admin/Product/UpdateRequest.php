<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            'name' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|integer',
            'old_price' => 'nullable|integer',
            'count' => 'required|integer',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|integer|exists:tags,id',  //проверка для элементов внутри массива
            'colors' => 'nullable|array',
            'colors.*' => 'nullable|integer|exists:colors,id',
            'category_id' => 'nullable|integer',
            'group_id' => 'nullable|integer',
            'preview_img' => 'nullable|image',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле обязательно для заполнения',
            'name.string' => 'Данные должны быть строчного типа',

            'description.required' => 'Это поле обязательно для заполнения',
            'description.string' => 'Данные должны быть строчного типа',

            'content.required' => 'Это поле обязательно для заполнения',
            'content.string' => 'Данные должны быть строчного типа',

            'price.required' => 'Это поле обязательно для заполнения',
            'price.integer' => 'Данные должны быть цыфры',

            'count.required' => 'Это поле обязательно для заполнения',
            'count.integer' => 'Данные должны быть цыфры',

            'preview_img.image' => 'Загружать можно только изображение',
 

        ];
    }
}
