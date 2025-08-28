<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;

class StoreController extends Controller
{
    /**
     * Create a new question
     *
     * @param QuestionRequest $request
     * @return void
     */
    public function __invoke(QuestionRequest $request)
    {
        Question::create($request->validated());
        return redirect()->route('index')->with('success', 'Question added successfully.');
    }
}