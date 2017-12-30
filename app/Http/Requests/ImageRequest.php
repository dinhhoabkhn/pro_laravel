<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'avatar' => 'required|mimes:jpeg,bmp,png,jpg|max:10240',
        ];
    }
    public function messages()
    {
        return [
            'avatar.required' => 'Select an image to upload',
            'avatar.max' => 'Images size is too large',
            'avatar.mimes'=> 'This file is not a image'
        ];
    }
}
