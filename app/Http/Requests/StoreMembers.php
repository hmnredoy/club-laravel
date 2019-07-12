<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreMembers extends FormRequest
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

   // $regex = regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'club' => 'required',
            'name' => 'required|regex: /[a-zA-Z]/',
            'username' => 'required|alpha_num|unique:users',
            'dob' => 'required|date',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|min:11',
            'password' => 'required|string|min:6|',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'gender' => 'required'
        ];
    }
}
