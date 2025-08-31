<x-layout title="{{ config('app.name') }}">
    <form method="GET" action="{{ route('index') }}" class="mb-4">
        <x-filters />

        <div class="row justify-content-center mt-1">
            @auth
                <div class="col-md-2 my-1">
                    <a href="{{ route('question.create') }}" class="btn btn-success w-100">
                        <i class="bi bi-plus-circle"></i> {{ __('Add') }}
                    </a>
                </div>
            @endauth

            <div class="col-md-2 my-1">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> {{ __('Find') }}
                </button>
            </div>

            <div class="col-md-2 my-1">
                <a href="{{ route('index') }}" class="btn btn-secondary w-100">
                    <i class="bi bi-x-circle"></i> {{ __('Clear') }}
                </a>
            </div>

            <div class="col-md-2 my-1">
                <button type="button" class="btn btn-secondary w-100 d-none d-md-block" onclick="window.print()">
                    <i class="bi bi-printer"></i> {{ __('print') }}
                </button>
            </div>
        </div>
    </form>

    <div id="print-results">
        @foreach ($questions as $question)
            <x-question :question="$question">
                @auth
                    <div class="row text-center mt-3 print-hidden">
                        <div class="col-12">
                            <a href="{{ route('question.edit', $question) }}" class="btn btn-warning mx-1">
                                <i class="bi bi-pencil-square"></i> {{ __('Edit') }}
                            </a>

                            <a href="{{ route('question.delete', $question) }}" class="btn btn-danger mx-1">
                                <i class="bi bi-trash"></i> {{ __('Delete') }}
                            </a>
                        </div>
                    </div>
                @endauth
            </x-question>
        @endforeach
    </div>

    {{ $questions->links() }}

</x-layout>
