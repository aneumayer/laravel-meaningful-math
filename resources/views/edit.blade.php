@extends('app')

@section('content')
<div class="container">
    <h1>Edit Question</h1>
    <form action="{{ route('update', $question->id) }}" method="POST">
        @csrf
        @method('PUT')

        @if(request()->has('admin'))
            <input type="hidden" name="admin" value="1">
        @endif

        <div class="form-group">
            <label for="question">Question</label>
            <textarea class="form-control" id="question" name="question" required>{{ old('question', $question->question) }}</textarea>
        </div>

        <div class="form-group">
            <label for="answer">Answer</label>
            <textarea class="form-control" id="answer" name="answer" required>{{ old('answer', $question->answer) }}</textarea>
        </div>

        <div class="form-group">
            <label for="grade_level">Grade Level</label>
            <div>
                @foreach(['PK','K','1','2','3','4','5','6','7','8','9','10','11','12'] as $level)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="grade_level_{{ $level }}" name="grade_level[]" value="{{ $level }}" {{ in_array($level, old('grade_level', $question->grade_level)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="grade_level_{{ $level }}">{{ $level }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject', $question->subject) }}" required>
        </div>

        <div class="form-group">
            <label for="source">Source</label>
            <input type="text" class="form-control" id="source" name="source" value="{{ old('source', $question->source) }}" required>
        </div>

        <div class="form-group">
            <label for="authorization">Authorization</label>
            <input type="text" class="form-control" id="authorization" name="authorization" required>
            @error('authorization')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Question</button>
        <a href="{{ route('index') }}?admin" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection