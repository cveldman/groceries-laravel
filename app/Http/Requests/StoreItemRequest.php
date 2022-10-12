<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product' => ['string', 'max:255'],
            'product_id' => ['exists:products,id']
        ];
    }
}
