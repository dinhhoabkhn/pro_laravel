<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
        // $this->request->method = 
        return [
            'name'=>'required',
            'email'=>'required|unique:students,email',
            'student_code'=>'required|digits:8|',
            'phone'=>'required|max:11',
            'class'=>'required',
            'birthday'=>'required',
            'address'=>'required',
        ];
    }
}
