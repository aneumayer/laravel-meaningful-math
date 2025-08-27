<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Request $request, Question $question)
    {
        $question->delete();
        return redirect()->route('index')->with('success', 'Question deleted successfully.');
    }
}