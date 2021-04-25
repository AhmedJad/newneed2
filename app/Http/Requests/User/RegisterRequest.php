<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
class RegisterRequest extends FormRequest
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
            
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|regex:#(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&].{8,}#",
            "phone" => "required|regex:#(01)[0-9]{9}#",
        ];
    }
}
