<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukRequest extends FormRequest
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

    public function rules()
    {
        return [
            'nama_produk' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_produk.required' => 'Data nama produk harus diisi!'
        ];
    }
}
