<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
           'course_code'=>'required|digits:5|unique:courses,course_code'. $this->route('manager_course'),
            'class'=>'required',
            'semester'=>'required|digits:5',
            'timestart'=>'required',
            'timefinish'=>'required',
            'weekday'=>'required',
        ];
    }
}
