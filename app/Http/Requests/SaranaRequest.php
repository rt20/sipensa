<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaranaRequest extends FormRequest
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
            'nama' => 'required|max:255',
            'jenis' => 'required',
            'telepon' => 'required',
            'alamat_kantor' => 'required|max:255',
            'alamat_sarana' => 'required|max:255',
            'nama_pangan' => 'required',
            'merk' => 'required',
            'penanggungjawab' => 'required',
            // 'keterangan' => 'required',
        ];
    }
}
