<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClub extends FormRequest
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
            'club_name' => 'required',
            'description' => 'required',
            'moderator_name' => 'required|alpha_num',
            'club_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ];
    }
}
