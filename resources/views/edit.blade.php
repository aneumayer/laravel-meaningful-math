@extends('app')

@section('content')
<h1>Edit Question</h1>
<form action="{{ route('update', $question->id) }}" method="POST">
    @csrf
    @method('PUT')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
        <label for="grade">Grade</label>
        <div>
            @foreach(['PK','K','1','2','3','4','5','6'] as $level)
                <div class="form-check form-check-inline">
                    <input class="form-check-input grade-checkbox" type="checkbox" id="grade_{{ $level }}" name="grade[]" value="{{ $level }}" {{ in_array($level, old('grade', $question->grade)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="grade_{{ $level }}">{{ $level }}</label>
                </div>
            @endforeach
            <div class="w-100"></div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="select_all_grades">
                <label class="form-check-label" for="select_all_grades"><strong>Select All</strong></label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject', $question->subject) }}" required>
    </div>

    <div class="form-group">
        <label for="skill">Skill</label>
        <input type="text" class="form-control" id="skill" name="skill" value="{{ old('skill', $question->skill) }}">
    </div>

    <div class="form-group">
        <label for="source">Source</label>
        <input type="text" class="form-control" id="source" name="source" value="{{ old('source', $question->source) }}" required>
    </div>

    <div class="form-group">
        <label for="book">Book Recommendation</label>
        <input type="text" class="form-control" id="book" name="book" value="{{ old('book', $question->book) }}">
    </div>

    <div class="form-group">
        <label for="authorization">Authorization</label>
        <input type="text" class="form-control" id="authorization" name="authorization" required autocomplete="authorization">
        @error('authorization')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="bi bi-save"></i> Update
    </button>
    <a href="{{ route('index') }}?admin" class="btn btn-secondary">
        <i class="bi bi-x-circle"></i> Cancel
    </a>
</form>

<script>
document.getElementById('select_all_grades').addEventListener('change', function() {
    const checked = this.checked;
    document.querySelectorAll('.grade-checkbox').forEach(cb => cb.checked = checked);
});
</script>
@endsection