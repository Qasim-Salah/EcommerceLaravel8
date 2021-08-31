<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'slug' => 'required|unique:products,slug',
            'description' => 'required|max:1000',
            'short_description' => 'nullable|max:500',
            'regular_price' => 'required|numeric', //[]
            'sale_price' => 'numeric|nullable',
            'sku' => 'required|max:100',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            'category_id' => 'numeric|exists:categories,id',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif|max:20000',


        ];
    }

    public function messages()
    {
        return [
            //
        ];

    }
}
