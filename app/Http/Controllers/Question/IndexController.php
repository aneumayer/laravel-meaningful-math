<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Show all the questions
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request)
    {
        $query = Question::query();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('question', 'like', '%' . $request->search . '%')
                  ->orWhere('answer', 'like', '%' . $request->search . '%')
                  ->orWhere('source', 'like', '%' . $request->search . '%')
                  ->orWhere('book', 'like', '%' . $request->search . '%');
            });
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

        $questions = $query->paginate(config('services.math.per_page'));

        // Get unique subjects and skills for dropdowns
        $subjects = Question::whereNotNull('subject')->distinct()->orderBy('subject', 'asc')->pluck('subject');
        $skills   = Question::whereNotNull('skill')->distinct()->orderBy('skill', 'asc')->pluck('skill');

        return view('index', compact('questions', 'subjects', 'skills'));
    }
}