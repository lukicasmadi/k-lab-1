<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportAnevDisplay extends FormRequest
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
            'operation_id' => 'required',
            'tahun_pembanding_pertama' => 'required',
            'tahun_pembanding_kedua' => 'required',
            'tanggal_pembanding_pertama' => 'required',
            'tanggal_pembanding_kedua' => 'required',
        ];
    }
}
