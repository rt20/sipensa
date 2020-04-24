<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuditRequest extends FormRequest
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
            // 'budget_id' => 'required',
            // 'surat_tugas' => 'required|min:8',
            // 'tgl_st' => 'required|date',
            // 'sarana_id' => 'required|integer',
            // 'subdit_id' => 'required',
            // 'tgl_audit' => 'required|date',
            // 'auditor1' => 'required|integer',
            // 'auditor2' => 'required|integer',
            // 'auditor3' => 'required|max:255',
            // 'lokasi' => 'required|max:255',
            // 'jenis_sarana' => 'required',
            // 'jenis_keg' => 'required',
            // 'hasil' => 'required',
            // 'kesimpulan' => 'required',
            // 'biaya' => 'required|integer',
            
        ];
    }
}
