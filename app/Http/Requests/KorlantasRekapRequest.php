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
            'hari' => 'required_if:operation_date,pilih_hari'
        ];
    }

    public function messages()
    {
        return [
            'report_name.required' => 'Nama laporan tidak boleh kosong',
            'polda.required' => 'Nama polda tidak boleh kosong',
            'year.required' => 'Tahun tidak boleh kosong',
            'rencana_operasi_id.required' => 'Nama operasi tidak boleh kosong',
            'hari.required' => 'Pilihan hari tidak boleh kosong',
        ];
    }
}
