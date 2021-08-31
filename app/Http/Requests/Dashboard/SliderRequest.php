<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title' => 'required|max:100',
            'subtitle' => 'required|max:100',
            'price' => 'required|numeric', //[]
            'link' => 'required|max:100',
            'status' => 'required',
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
