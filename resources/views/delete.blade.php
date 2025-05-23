@extends('app')

@section('content')
<div class="container">
    <h1>Delete Question</h1>
    <p>Are you sure you want to delete the question: <strong>{{ $question->question }}</strong>?</p>

    <form action="{{ route('destroy', $question->id) }}{{ request()->has('admin') ? '?admin' : '' }}" method="POST">
        @csrf
        @method('DELETE')

        @if(request()->has('admin'))
            <input type="hidden" name="admin" value="1">
        @endif

        <div class="form-group">
            <label for="authorization">Authorization</label>
            <input type="text" class="form-control" id="authorization" name="authorization" required>
            @error('authorization')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="{{ route('index') }}?admin" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection