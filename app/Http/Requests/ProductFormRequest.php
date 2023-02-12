<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'product_name' => [
                'required',
                'string'
            ],
            'product_desc' => [
                'required',
                'string'
            ],
            'product_tags' => [
                'required',
                'string'
            ],
            'product_price' => [
                'required',
                'string'
            ],
            'product_status' => [
                'required',
                'string'
            ],
            'product_cat' => [
                'required',
                'string'
            ],
            'product_img' => [
                'required',
                'mimes:jpeg,jpg,png'
            ]
        ];
    }
}

// 'product_name' => 'required',
// 'product_price'=> 'required',
// 'product_desc'=> 'required',
// 'product_status'=> 'required',
// 'product_tags'=> 'required',
// 'product_cat'=> 'required',
