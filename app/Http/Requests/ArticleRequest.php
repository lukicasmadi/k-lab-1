<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'topic' => 'required',
            'desc' => 'required',
            'status' => 'required',
            'small_img' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'topic.required' => 'Judul tidak boleh kosong',
            'desc.unique' => 'Deskripsi tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
            'small_img.required' => 'Thumbnail belum dipilih',
        ];
    }
}
