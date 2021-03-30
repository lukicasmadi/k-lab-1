<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RencanaOperasiUpdateRequest extends FormRequest
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
            'edit_jenis_operasi' => 'required',
            'edit_nama_operasi' => 'required',
            'edit_tanggal_mulai' => 'required',
            'edit_tanggal_selesai' => 'required',
            'edit_deskripsi' => 'required',
            'uuid_edit' => 'required',
        ];
    }
}
