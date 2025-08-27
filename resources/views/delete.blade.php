@extends('app')

@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="w-100" style="max-width: 500px;">
        <h1 class="mb-4 text-center">Delete Question</h1>
        <p class="text-center">
            Are you sure you want to delete the question:
            <strong>{{ $question->question }}</strong>?
        </p>

        <form action="{{ route('destroy', $question->id) }}" method="POST" class="text-center">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger mx-1">
                <i class="bi bi-trash"></i> Delete
            </button>
            <a href="{{ route('index') }}?admin" class="btn btn-secondary mx-1">
                <i class="bi bi-x-circle"></i> Cancel
            </a>
        </form>
    </div>
</div>
@endsection