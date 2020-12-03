<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];
    }

    public function withValidator(Validator $validator)
    {
        // バリデーションが終了した後の追加のバリデーション($validator->after)
        $validator->after(function ($validator) {
            //現在のパスワードと新しいパスワードが合わなければエラー
            if (!(Hash::check($this->input('current_password'), Auth::user()->password))) {
                $validator->errors()->add('current_password', __('The current password is incorrect.'));
            }
        });
    }
}
