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
            'answer' => 'required|string',
            'grade' => 'required|array',
            'grade.*' => 'in:PK,K,1,2,3,4,5,6,7,8,9,10,11,12',
            'subject' => 'required|string|max:100',
            'source' => 'nullable|string|max:255',
            'authorization' => ['required', function ($attribute, $value, $fail) {
                if ($value !== env('AUTHORIZATION_CODE')) {
                    $fail('The authorization code is incorrect.');
                }
            }],
        ];
    }
}