<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;

class UpdateController extends Controller
{
    public function __invoke(QuestionRequest $request, Question $question)
    {
        $question->update($request->validated());
        return redirect()->route('index')->with('success', 'Question updated successfully.');
    }
}