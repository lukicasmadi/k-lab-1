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
        $requiredOnCreate = request()->isMethod('PATCH') ? '' : 'required';
        return [
            'topic' => 'required',
            'desc' => 'required',
            'status' => 'required',
            'small_img' => $requiredOnCreate,
        ];
    }

    public function messages()
    {
        return [
            'topic.required' => 'Judul tidak boleh kosong',
            'desc.required' => 'Deskripsi tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
            'small_img.required' => 'Thumbnail belum dipilih',
        ];
    }
}
