<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'=>'required|max:255|min:2',
            'username'=>'required|max:255|unique:users,username',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|max:255|min:7'
        ];
    }
}
