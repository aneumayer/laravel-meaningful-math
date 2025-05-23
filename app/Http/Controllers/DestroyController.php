<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Request $request, Question $question)
    {
        $request->validate([
            'authorization' => ['required', function ($attribute, $value, $fail) {
                if ($value !== env('AUTHORIZATION_CODE')) {
                    $fail('The authorization code is incorrect.');
                }
            }],
        ]);
        $question->delete();
        return redirect()->route('index', ['admin'])->with('success', 'Question deleted successfully.');
    }
}