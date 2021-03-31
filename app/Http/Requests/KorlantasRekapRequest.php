<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KorlantasRekapRequest extends FormRequest
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
            'report_name' => 'required',
            'polda' => 'required',
            'year' => 'required',
            'rencana_operasi_id' => 'required|integer',
            'operation_date' => 'required',
            'hari' => 'required_if:selected_hari,pilih_hari'
        ];
    }
}
