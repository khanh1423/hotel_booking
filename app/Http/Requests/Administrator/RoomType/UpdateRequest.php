<?php

namespace App\Http\Requests\Administrator\RoomType;

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
            'roomtype_name' => ['required'],
            'roomtype_note' => ['required'],
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
            'roomtype_name.required' => 'Trường tên loại phòng không được để trống!', 
            'roomtype_note.required' => 'Trường mô tả không được để trống!', 
        ];
    }
}
