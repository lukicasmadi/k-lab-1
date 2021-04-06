<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComparisonExcelRequest extends FormRequest
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
            'tanggal' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'operation_id.required' => 'Nama operasi tidak boleh kosong',
            'tahun_pembanding_pertama.required' => 'Tahun pembanding pertama tidak boleh kosong',
            'tahun_pembanding_kedua.required' => 'Tahun pembanding kedua tidak boleh kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong'
        ];
    }
}
