<?php

namespace App\Http\Requests\Administrator\Role;

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
            'role_name' => ['required'],
            'role_note' => ['required'],
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
            'role_name.required' => 'Trường tên công việc không được để trống!', 
            'role_note.required' => 'Trường mô tả không được để trống!', 
        ];
    }
}
