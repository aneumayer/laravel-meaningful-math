<?php

namespace App\View\Components;

use App\Models\Question;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Filters extends Component
{
    public $subjects;
    public $skills;
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Get unique subjects and skills for dropdowns
        $this->subjects = Question::whereNotNull('subject')
            ->distinct()->orderBy('subject', 'asc')->pluck('subject');
        $this->skills   = Question::whereNotNull('skill')
            ->distinct()->orderBy('skill', 'asc')->pluck('skill');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filters');
    }
}
