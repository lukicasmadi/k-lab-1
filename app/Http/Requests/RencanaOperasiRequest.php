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
            'jenis_operasi' => 'required',
            'nama_operasi' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'jenis_operasi.required' => 'Jenis operasi tidak boleh kosong',
            'nama_operasi.required' => 'Nama operasi tidak boleh kosong',
            'tanggal_mulai.required' => 'Tanggal operasi mulai tidak boleh kosong',
            'tanggal_selesai.required' => 'Tanggal operasi selesai tidak boleh kosong',
        ];
    }
}
