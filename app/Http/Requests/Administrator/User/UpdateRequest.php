<?php

namespace App\Http\Requests\Administrator\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'user_name'             => ['required'],
            'user_email'            => ['required'],
            'user_phone'            => ['required'],
            // 'user_password'         => ['required', 'min:6'],
            'user_confirm_password' => ['same:user_password'],
            'user_address'          => ['required'],

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
            'user_name.required'            => 'Trường tên nhân viên không được để trống!',
            'user_email.required'           => 'Trường Email không được để trống!',
            // 'user_email.unique'             => 'Trường Email bị trùng!',
            'user_phone.required'           => 'Trường số điện thoại không được để trống!',
            // 'user_password.required'        => 'Trường mật khẩu không được để trống!',
            // 'user_password.min'             => 'Trường mật khẩu tối thiếu là 6 ký tự!',
            // 'user_confirm_password.required'=> 'Trường xác nhận mật khẩu không được để trống!',
            'user_confirm_password.same'    => 'Xác nhận mật khẩu không chính xác!',
            'user_address.required'         => 'Trường địa chỉ không được để trống!',

        ];
    }
}
