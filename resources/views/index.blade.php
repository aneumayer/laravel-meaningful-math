@extends('app')

@section('content')
<h1>Filter the Word Problems</h1>

<form method="GET" action="{{ route('index') }}" class="mb-4">
    @if(request()->has('admin'))
        <input type="hidden" name="admin" value="1">
    @endif
    <div class="row mb-2">
        <div class="col">
            <input type="text" name="search" class="form-control" placeholder="Term ..." value="{{ request('search') }}">
        </div>
        <div class="col">
            <select name="grade" class="form-control">
                <option value="">Grade</option>
                <option value="PK" {{ request('grade') == 'PK' ? 'selected' : '' }}>PK</option>
                <option value="K" {{ request('grade') == 'K' ? 'selected' : '' }}>K</option>
                <option value="1" {{ request('grade') == '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ request('grade') == '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ request('grade') == '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ request('grade') == '4' ? 'selected' : '' }}>4</option>
                <option value="5" {{ request('grade') == '5' ? 'selected' : '' }}>5</option>
                <option value="6" {{ request('grade') == '6' ? 'selected' : '' }}>6</option>
            </select>
        </div>
        <div class="col">
            <select name="subject" class="form-control">
                <option value="">Subject</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject }}" {{ request('subject') == $subject ? 'selected' : '' }}>{{ $subject }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select name="skill" class="form-control">
                <option value="">Skill</option>
                @foreach($skills as $skill)
                    <option value="{{ $skill }}" {{ request('skill') == $skill ? 'selected' : '' }}>{{ $skill }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
        <div class="col-md-2">
            <a href="{{ request()->has('admin') ? route('index', ['admin' => 1]) : route('index') }}" class="btn btn-secondary w-100">Clear</a>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-secondary w-100 d-none d-md-block" onclick="window.print()">Print</button>
        </div>
    </div>
</form>

@if(request()->has('admin'))
    <a href="{{ route('create') }}" class="btn btn-success mb-3">Add Question</a>
@endif

<div id="print-results">
@foreach($questions as $question)
    <div class="card mb-4">
        <div class="card-body">
            @if(!empty($question->question))
            <div class="row mb-2">
                <div class="col-auto font-weight-bold question-label">Question:</div>
                <div class="col">{{ $question->question }}</div>
            </div>
            @endif

            @if(!empty($question->answer))
            <div class="row mb-2">
                <div class="col-auto font-weight-bold question-label">Answer:</div>
                <div class="col">{{ $question->answer }}</div>
            </div>
            @endif

            @if(!empty($question->grade))
            <div class="row mb-2">
                <div class="col-auto font-weight-bold question-label">Grade:</div>
                <div class="col">{{ is_array($question->grade) ? implode(', ', $question->grade) : $question->grade }}</div>
            </div>
            @endif

            @if(!empty($question->subject))
            <div class="row mb-2">
                <div class="col-auto font-weight-bold question-label">Subject:</div>
                <div class="col">{{ $question->subject }}</div>
            </div>
            @endif

            @if(!empty($question->skill))
            <div class="row mb-2">
                <div class="col-auto font-weight-bold question-label">Skill:</div>
                <div class="col">{{ $question->skill }}</div>
            </div>
            @endif

            @if(!empty($question->source))
            <div class="row mb-2">
                <div class="col-auto font-weight-bold question-label">Source:</div>
                <div class="col">{{ $question->source }}</div>
            </div>
            @endif

            @if(!empty($question->book))
            <div class="row mb-2">
                <div class="col-auto font-weight-bold question-label">Read:</div>
                <div class="col">{{ $question->book }}</div>
            </div>
            @endif

            @if(request()->has('admin'))
                <div class="row mt-3">
                    <div class="col-12">
                        <a href="{{ route('edit', $question->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('delete', $question->id) }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endforeach
</div>

{{ $questions->appends(request()->has('admin') ? ['admin' => 1] : [])->links() }}
@endsection