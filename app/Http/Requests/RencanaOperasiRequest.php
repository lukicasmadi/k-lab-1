<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RencanaOperasiRequest extends FormRequest
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
            'operation_type' => 'required',
            'operation_periode' => 'required|regex:/to/i',
            'desc' => 'required',
            'document_attach' => 'nullable|file|mimes:jpg,jpeg,png,gif,rar,zip,txt,doc,docx,pdf,xls,xlsx,ppt,pptx,html',
        ];
    }
}
