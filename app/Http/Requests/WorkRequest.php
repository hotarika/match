<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class WorkRequest extends FormRequest
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
        $today = date("Y/m/d");

        return [
            'name' => ['required',  'string', 'max:100'],
            'end_date' => ['required', ' date', 'after:' . $today],
            'hope_date' =>  ['required ', ' date', 'after:end_date'],
            'contract_id' =>  ['required'],
            'price_lower' => ['required_if:contract_id,1'],
            'price_upper' => ['required_if:contract_id,1',],
            'content' => ['required ', 'string'],
        ];
    }

    public function withValidator(Validator $validator)
    {
        // 下限金額が1未満であれば、バリデーション発火
        $validator->sometimes('price_lower', 'gt:0', function ($input) {
            if ($input->contract_id == 1) return $input->price_lower < 1;
        });
        // 下限金額が上限金額より多ければ、バリデーション発火
        $validator->sometimes('price_upper', 'gte:price_lower', function ($input) {
            if ($input->contract_id == 1) return $input->price_lower > $input->price_upper;
        });
    }
}
