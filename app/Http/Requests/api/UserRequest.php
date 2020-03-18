<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'      =>  'required|min:2|max:50',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|confirmed|min:8|max:16'
        ];
    }
    
    public function response(array $errors)
    {
        return new JsonResponse(['error' => $errors], 400);
    }
}
