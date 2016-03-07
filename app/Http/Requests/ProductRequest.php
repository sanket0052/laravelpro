<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|max:50|unique:products',
                    'category_id' => 'required',
                    'description' => 'required',
                    'model' => 'required',
                    'stock' => 'required|numeric',
                    'price' => 'required|numeric',
                    'image' => 'required|mimes:jpeg,jpg,png'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|max:50',
                    'category_id' => 'required',
                    'description' => 'required',
                    'model' => 'required',
                    'stock' => 'required|numeric',
                    'price' => 'required|numeric'
                ]; 
            }
            default:break;
        }
    }
}
