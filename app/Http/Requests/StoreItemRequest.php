<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    //  trueにしないとエラーになる
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:50'],
            'memo' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
        ];
    }
}
