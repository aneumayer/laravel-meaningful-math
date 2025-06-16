<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'question' => 'required|string',
            'answer'   => 'required|string',
            'grade'    => 'required|array',
            'grade.*'  => 'in:PK,K,1,2,3,4,5,6',
            'subject'  => 'required|string|max:100',
            'skill'    => 'nullable|string',
            'source'   => 'nullable|string',
            'book'     => 'nullable|string',
            'authorization' => ['required', function ($attribute, $value, $fail) {
                if ($value !== config('services.math.auth')) {
                    $fail('The authorization code is incorrect.');
                }
            }],
        ];
    }
}