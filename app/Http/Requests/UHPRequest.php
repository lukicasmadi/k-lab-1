<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UHPRequest extends FormRequest
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
            'polda_id' => [
                'required',
                Rule::unique('user_has_poldas')->where(function ($query) {
                    return $query->where('user_id', $this->input('user_assign'))->where('polda_id', $this->input('polda_id'));
                }),
            ],
            'user_assign' => 'required'
        ];
    }
}
