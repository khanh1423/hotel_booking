<?php

namespace App\Http\Requests\Administrator\Room;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'room_image' => ['required'],
            'room_name' => ['required', 'unique:rooms,name'],
            'room_note' => ['required'],
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
            'room_image.required' => 'Hình ảnh không được để trống!', 
            'room_name.required'  => 'Trường tên phòng không được để trống!', 
            'room_name.unique'    => 'Trường tên phòng bị trùng!',
            'room_note.required'  => 'Trường mô tả không được để trống!', 
        ];
    }
}
