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
            'work' => ['required',  'string', 'max:60'],
            'end_date' => ['required', ' date', 'after:' . $today],
            'hope_date' =>  ['required ', ' date', 'after:end_date'],
            'contract_id' =>  ['required'],
            'price_lower' => ['required_if:contract_id,1'],
            'price_upper' => ['required_if:contract_id,1'],
            'order_content' => ['required ', 'string', 'max:3000'],
        ];
    }

    public function withValidator(Validator $validator)
    {
        // **************************
        // 下限金額設定
        // **************************
        // 下限金額が0以上かどうか
        $validator->sometimes('price_lower', 'integer|gt:0', function ($input) {
            if ($input->contract_id == 1) return $input->price_lower < 1;
        });
        // 下限金額が1000千円以下かどうか
        $validator->sometimes('price_lower', 'integer|max:1000', function ($input) {
            if ($input->contract_id == 1) return $input->price_lower >= 1000;
        });

        // **************************
        // 上限金額設定
        // **************************
        // 下限金額が上限金額より多いかどうかのバリデーション
        $validator->sometimes('price_upper', 'integer|gte:price_lower', function ($input) {
            if ($input->contract_id == 1) return $input->price_lower > $input->price_upper;
        });
        // 上限金額が1000千円以下かどうか
        $validator->sometimes('price_upper', 'integer|max:1000', function ($input) {
            if ($input->contract_id == 1) return $input->price_upper >= 1000;
        });
    }
}
