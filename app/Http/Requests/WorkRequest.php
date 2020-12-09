<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'price_lower' => ['numeric', 'required_if:contract,1', 'gt:0'],
            'price_upper' => ['required_if:contract,1', 'gte:price_lower'],
            'content' => ['required ', 'string'],
        ];
    }
}