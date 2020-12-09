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
            'endRecruitment' => ['required', ' date', 'after:' . $today],
            'hopeDeadline' =>  ['required ', ' date', 'after:endRecruitment'],
            'contract' =>  ['required'],
            'priceLower' => ['numeric', 'required_if:contract,1', 'gt:0'],
            'priceUpper' => ['required_if:contract,1', 'gte:priceLower'],
            'content' => ['required ', 'string'],
        ];
    }
}
