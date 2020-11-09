<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpphRequest extends FormRequest
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

    public function messages()
    {
        return [
            'required'              => ':Attribute field is required.',
            'unique'                => 'Nomor SPPH have already exist',
        ];
    }

    public function rules()
    {
        // dd($this->all());
        $rules = [];
        $id = $this->get('id') ? '' . $this->get('id') : '';

        // check condition save or draft 
        if($this->get('status') == 'save'){
                $rules = [
                    'nomor_spph' => 'required|unique:spphs,nomor_spph,except,'.$id,
                    'tanggal_spph' => 'required',
                    'tanggal_sph' => 'required',
                    'judul' => 'required',
                    'mitra_id' => 'required',
                    'penanggung_jawab' => 'required',
                ];
        }else{
            $rules = [
                'nomor_spph' => 'required|unique:spphs,nomor_spph,except,id',
                'tanggal_spph' => 'required',
            ];
        }
        return $rules;
    }
}
