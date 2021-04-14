<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DailyRekapEditRequest extends FormRequest
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
            'report_name_edit' => 'required',
            'polda_edit' => 'required',
            'year_edit' => 'required|numeric',
            'rencana_operasi_id_edit' => 'required|integer',
            'config_date_edit' => 'required',
            'tanggal_mulai_edit' => 'required_if:config_date,custom_date',
            'tanggal_selesai_edit' => 'required_if:config_date,custom_date',
        ];
    }

    public function messages()
    {
        return [
            'report_name_edit.required' => 'Nama laporan tidak boleh kosong',
            'polda_edit.required' => 'Nama polda tidak boleh kosong',
            'year_edit.required' => 'Tahun tidak boleh kosong',
            'year_edit.numeric' => 'Tahun tidak boleh diisi selain angka',
            'rencana_operasi_id_edit.required' => 'Nama operasi tidak boleh kosong',
            'config_date_edit.required' => 'Pilihan hari operasi tidak boleh kosong',
            'tanggal_mulai_edit.required' => 'Pilihan hari mulai tidak boleh kosong',
            'tanggal_selesai_edit.required' => 'Pilihan hari selesai tidak boleh kosong',
        ];
    }
}
