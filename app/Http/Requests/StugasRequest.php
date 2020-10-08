<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StugasRequest extends FormRequest
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
            'no_st' => 'max:255',
            'tgl_st' => 'date',
            'tgl_audit' => 'date',
            'budget_id' => 'integer',
            'user_id' => 'array',
            'tambahan' => 'max:255',
            #'sarana_id' => 'integer',
            'subdit_id' => 'integer',
            'lokasi' => 'max:255'
        ];
    }
}
