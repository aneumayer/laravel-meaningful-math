@extends('app')

@section('content')
<h1>Add New Question</h1>
<form action="{{ route('store') }}" method="POST">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
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
        <label>Grade</label>
        <div>
            @foreach(['PK','K','1','2','3','4','5','6'] as $grade)
                <div class="form-check form-check-inline">
                    <input class="form-check-input grade-checkbox" type="checkbox" name="grade[]" id="grade_{{ $grade }}" value="{{ $grade }}">
                    <label class="form-check-label" for="grade_{{ $grade }}">{{ $grade }}</label>
                </div>
            @endforeach
            <div class="w-100"></div> <!-- Forces next item to new line -->
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" id="select_all_grades">
                <label class="form-check-label" for="select_all_grades"><strong>Select All</strong></label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" required>
    </div>

    <div class="form-group">
        <label for="skill">Skill</label>
        <input type="text" class="form-control" id="skill" name="skill">
    </div>

    <div class="form-group">
        <label for="source">Source</label>
        <input type="text" class="form-control" id="source" name="source" required>
    </div>

    <div class="form-group">
        <label for="book">Book Recommendation</label>
        <input type="text" class="form-control" id="book" name="book">
    </div>

    <button type="submit" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Add
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