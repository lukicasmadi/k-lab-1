<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DailyRekapRequest extends FormRequest
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
            'year' => 'required|numeric',
            'rencana_operasi_id' => 'required|integer',
            'config_date' => 'required',
            'tanggal_mulai' => 'required_if:config_date,custom_date',
            'tanggal_selesai' => 'required_if:config_date,custom_date',
        ];
    }

    public function messages()
    {
        return [
            'report_name.required' => 'Nama laporan tidak boleh kosong',
            'polda.required' => 'Nama polda tidak boleh kosong',
            'year.required' => 'Tahun tidak boleh kosong',
            'year.numeric' => 'Tahun tidak boleh diisi selain angka',
            'rencana_operasi_id.required' => 'Nama operasi tidak boleh kosong',
            'config_date.required' => 'Pilihan hari operasi tidak boleh kosong',
            'tanggal_mulai.required' => 'Pilihan hari mulai tidak boleh kosong',
            'tanggal_selesai.required' => 'Pilihan hari selesai tidak boleh kosong',
        ];
    }
}
