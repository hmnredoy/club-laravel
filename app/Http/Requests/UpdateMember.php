<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMember extends FormRequest
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
            'name' => 'regex: /[a-zA-Z]/',
            'dob' => 'date',
            'email' => 'email',
            'phone' => 'numeric|min:11',
            'password' => 'string|min:6|',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ];
    }
}
