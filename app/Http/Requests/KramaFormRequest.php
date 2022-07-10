<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KramaFormRequest extends FormRequest
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
            //
        ];
    }

    public function messages()
    {
        return [
            'nik'           => 'required|numeric|min:16|unique:kramas',
            'nik.required' => 'Data :harus diinputkan',
            'nik.numeric' => 'Data :harus berupa angka',
            'nik.numeric' => 'Data :harus berjumlah :karakter',
            'no_kk'         => 'required|numeric|min:16',
            'nm'            => 'required|max:55',
            'tmpt'          => 'required',
            'tgl'           => 'required',
            'stts_dlm_klrg' => 'required',
            'jbt'           => 'required',
            'bnjr_adt'      => 'required',
            'tmpkn'         => 'required',
            'stts'          => 'required',
            'pndd'          => 'required',
            'pkrjn'         => 'required',
            'jk'            => 'required',
            'ktrgn'         => 'required',
            'ft'            => '',
            'nm_ddy'        => 'required',
            'nm_kt_ddy'     => 'required',
            'password'      => 'required',
        ];
    }
}
