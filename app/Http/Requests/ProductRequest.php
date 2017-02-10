<?php

namespace App\Http\Requests;

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
            'primaryImage' => 'required|mimes:jpg,jpeg,png',
            'sacendoryImages.*' => 'mimes:jpg,jpeg,png',
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
            'budget' => 'required'
        ];
    }
}
