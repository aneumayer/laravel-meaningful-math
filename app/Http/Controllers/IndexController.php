<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Question::query();

        if ($request->has('search')) {
            $query->where('question', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('grade')) {
            $query->whereJsonContains('grade', $request->grade);
        }

        if ($request->has('subject')) {
            $query->where('subject', 'like', '%' . $request->subject . '%');
        }

        $questions = $query->paginate(15);

        return view('index', compact('questions'));
    }
}