<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>[
                'required',
                'string'
            ],
            'email'=>[
                'required',
                'email'
            ],
            'contact'=>[
                'required',
                'numeric'
            ],
            'designation'=>[
                'required',
                'string'
            ],
            'facebook'=>[
                'nullable',
            ],
            'photo'=>[
                'nullable',
                'mimes:png,jpg'
            ],
            'village'=>[
                'required',
                'string'
            ],
            'post_office'=>[
                'required',
                'string'
            ],
            'police_station'=>[
                'required',
                'string'
            ],
            'district'=>[
                'required',
                'string'
            ],

        ];
    }
}
