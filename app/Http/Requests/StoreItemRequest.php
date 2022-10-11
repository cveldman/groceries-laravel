<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product' => ['required', 'string', 'max:255']
        ];
    }
}
