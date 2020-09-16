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
            'first_name' => 'required|min:1|max:20',
            'last_name' => 'required|min:1|max:20',
            'email' => 'required|max:40',
        ];
    }
}
