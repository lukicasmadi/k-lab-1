<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoldaRequest extends FormRequest
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
            'name' => 'required',
            'province' => 'required',
            'city' => 'required',
            'address' => 'required',
            'logo' => 'required|image',
            'aka' => 'present',
            'small_img' => 'present',
            'big_img' => 'present',
            'logo' => 'present',
            'profile' => 'present',
        ];
    }
}
