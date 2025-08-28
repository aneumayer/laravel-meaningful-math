<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    /**
     * Delete a question
     *
     * @param Request $request
     * @param Question $question
     * @return void
     */
    public function __invoke(Request $request, Question $question)
    {
        $question->delete();
        return redirect()->route('index')->with('success', 'Question deleted successfully.');
    }
}