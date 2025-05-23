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

        if ($request->filled('subject')) {
            $query->where('subject', $request->subject);
        }

        if ($request->filled('skill')) {
            $query->where('skill', $request->skill);
        }

        $questions = $query->paginate(15);

        // Get unique subjects and skills for dropdowns
        $subjects = Question::whereNotNull('subject')->distinct()->pluck('subject');
        $skills = Question::whereNotNull('skill')->distinct()->pluck('skill');

        return view('index', compact('questions', 'subjects', 'skills'));
    }
}