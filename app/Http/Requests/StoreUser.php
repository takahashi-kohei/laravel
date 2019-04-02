<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * バリデーションルール
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|max:10',
            'email'=>'required|string|email|max:191|unique:users',
            'password'=>'required|string|min:6|max:20|confirmed',
        ];
    }
}
