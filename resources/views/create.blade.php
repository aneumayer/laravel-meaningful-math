<x-layout title="Add Question">
    <form action="{{ route('question.store') }}" method="POST">
        @csrf

        <x-fields>
            <button type="submit" class="btn btn-success mx-1">
                <i class="bi bi-plus-circle"></i> {{ __('Add') }}
            </button>
        </x-fields>
</x-layout>
