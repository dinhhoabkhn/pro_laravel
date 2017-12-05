<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourse extends FormRequest
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
            'course_code'=>'required|digits:5|unique:teachers,course_code',
            'class'=>'required',
            'semester'=>'required|digits:5',
            'timeStart'=>'required',
            'timeFinish'=>'required',
            'weekdays'=>'required',
        ];
    }
}
