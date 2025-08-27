@extends('app')

@section('content')
<h1>Delete Question</h1>
<p>Are you sure you want to delete the question: <strong>{{ $question->question }}</strong>?</p>

<form action="{{ route('destroy', $question->id) }}" method="POST">
    @csrf
    @method('DELETE')


    <div class="form-group">
        <label for="authorization">Authorization</label>
        <input type="text" class="form-control" id="authorization" name="authorization" required autocomplete="authorization">
        @error('authorization')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-danger">
        <i class="bi bi-trash"></i> Delete
    </button>
    <a href="{{ route('index') }}?admin" class="btn btn-secondary">
        <i class="bi bi-x-circle"></i> Cancel
    </a>
</form>
@endsection