<?php

namespace Modules\Student\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'ar.name'=>'required',
            'ar.nationality'=>'required',
            'en.name'=>'required|alpha',
            'en.nationality'=>'required|alpha',
            'phone'=>'required|regex:/(01)[0-9]{9}/',
            'birth_date'=>'required|date'
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
