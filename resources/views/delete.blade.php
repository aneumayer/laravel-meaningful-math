<x-layout title="Delete Question">
    <div class="text-center my-4">
        {{ __('Are you sure you want to delete the question') }}:
        <strong>{{ $question->question }}</strong>?
    </div>

    <form action="{{ route('destroy', $question->id) }}" method="POST" class="text-center">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger mx-1">
            <i class="bi bi-trash"></i> {{ __('Delete') }}
        </button>

        <a href="{{ route('index') }}" class="btn btn-secondary mx-1">
            <i class="bi bi-x-circle"></i> {{ __('Cancel') }}
        </a>
    </form>
</x-layout>
