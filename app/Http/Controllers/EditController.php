<?php

namespace App\Http\Controllers;

use App\Models\Question;

class EditController extends Controller
{
    public function __invoke(Question $question)
    {
        return view('edit', compact('question'));
    }
}