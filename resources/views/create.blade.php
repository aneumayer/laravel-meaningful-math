@extends('app')

@section('content')
<div class="container mt-5">
    <h1>Add New Question</h1>
    <form action="{{ route('store') }}{{ request()->has('admin') ? '?admin' : '' }}" method="POST">
        @csrf

        @if(request()->has('admin'))
            <input type="hidden" name="admin" value="1">
        @endif

        <div class="form-group">
            <label for="question">Question</label>
            <textarea class="form-control" id="question" name="question" required></textarea>
        </div>

        <div class="form-group">
            <label for="answer">Answer</label>
            <textarea class="form-control" id="answer" name="answer" required></textarea>
        </div>

        <div class="form-group">
            <label>Grade Level</label>
            <div>
                @foreach(['PK','K','1','2','3','4','5','6','7','8','9','10','11','12'] as $grade)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="grade_level[]" id="grade_{{ $grade }}" value="{{ $grade }}">
                        <label class="form-check-label" for="grade_{{ $grade }}">{{ $grade }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>

        <div class="form-group">
            <label for="source">Source</label>
            <input type="text" class="form-control" id="source" name="source" required>
        </div>

        <div class="form-group">
            <label for="authorization">Authorization</label>
            <input type="text" class="form-control" id="authorization" name="authorization" required>
            @error('authorization')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Question</button>
        <a href="{{ route('index') }}?admin" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection