<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BrandRequest extends Request
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
                    'name' => 'required|max:50|unique:categories',
                    'description' => 'required',
                    'category_list' => 'required',
                    'logo' => 'required|mimes:jpeg,jpg,png',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|max:50',
                    'description' => 'required',
                    'category_list' => 'required',
                    'logo' => 'mimes:jpeg,jpg,png',
                ]; 
            }
            default:break;
        }
    }
}
