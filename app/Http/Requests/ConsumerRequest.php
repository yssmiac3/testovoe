<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsumerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'string|required|min:2|max:30',
            'last_name' => 'string|required|min:2|max:30',
            'email' => 'email|required|unique:consumers|min:5|max:30',
            'amount' => 'integer',
            ];
    }
}
