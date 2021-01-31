<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PHRORequest extends FormRequest
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
            'operation_name' => 'required',
            'detail_operation' => 'required',
            'additional_info' => 'nullable',
            'attachement' => 'nullable|file|mimes:jpeg,jpg,png,pdf,zip,rar,doc,docx,xls,xlsx,ppt,pptx',
        ];
    }
}
