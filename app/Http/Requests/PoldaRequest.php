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
        $logo = request()->isMethod('patch') ? 'nullable|mimes:jpeg,jpg,png|max:8000' : 'required|mimes:jpeg,jpg,png|max:8000';
        return [
            'name' => 'required',
            'short_name' => 'required',
            'logo' => $logo,
            // 'jurisdiction' => 'nullable',
            // 'headquarters' => 'nullable',
            // 'type' => 'nullable',
            // 'official_site' => 'nullable',
        ];
    }
}
