<?php

namespace Modules\Instructors\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInstructorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'ar.name'=>'required',
            'en.name'=>'required|alpha',
            'phone'=>'required|regex:/(01)[0-9]{9}/|unique:instructors,phone',
            'email'=>'required|email|unique:instructors,email',
            'cv'=>'required|mimes:pdf|max:4000',
            'photo' => 'mimes:jpeg,jpg,png | max:1000',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
