<x-layout title="Edit Question">
    <form action="{{ route('question.update', $question) }}" method="POST">
        @csrf
        @method('PUT')
        
        <x-fields :question="$question">
            <button type="submit" class="btn btn-primary mx-1">
                <i class="bi bi-save"></i> {{ __('Update') }}
            </button>
        </x-fields>
    </form>
</x-layout>
