<?php

namespace App\Http\Controllers;

use App\Models\Question;

class DeleteController extends Controller
{
    public function __invoke(Question $question)
    {
        return view('delete', compact('question'));
    }
}