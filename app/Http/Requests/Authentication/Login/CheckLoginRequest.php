<?php

namespace App\Http\Requests\Authentication\Login;

use Illuminate\Foundation\Http\FormRequest;

class CheckLoginRequest extends FormRequest
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
            'email'     => ['required'],
            'password'  => ['required'],
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required'    => 'Bạn chưa nhập E-mail !',
            'password.required' => 'Bạn chưa nhập mật khẩu !',
        ];
    }
}
