<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;
use Laminas\Diactoros\Response\JsonResponse;

class LoginRequest extends FormRequest
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
            'email' => 'required|exists:users,NULL',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => 'These credentials entered do not match any of our records.'
        ];
    }

    public function response(array $errors)
    {
        return new JsonResponse(['error' => $errors], 400);
    }
}
