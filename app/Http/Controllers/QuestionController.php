<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\QuestionRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class QuestionController extends Controller implements HasMiddleware
{
    /**
     * All only viewing is for guests
     */
    public static function middleware(): array
    {
        return [new Middleware('auth', except: ['index', 'show'])];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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

        // Filters
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        Question::create($request->validated());
        return redirect()->route('index')->with('success', 'Question added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return view('show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return view('edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $question->update($request->validated());
        return redirect()->route('index')->with('success', 'Question updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete(Question $question)
    {
        return view('delete', compact('question'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('index')->with('success', 'Question deleted successfully.');
    }
}
