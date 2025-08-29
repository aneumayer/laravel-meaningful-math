<x-layout title="{{ config('app.name') }}">
    <form method="GET" action="{{ route('index') }}" class="mb-4">
        <div class="row mb-2">
            <div class="col-12 col-md">
                <input type="text" name="search" class="form-control" placeholder="Search Term ..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-12 col-md">
                <select name="grade" class="form-control">
                    <option value="">{{ __('Select Grade') }}</option>
                    @foreach (['PK', 'K', '1', '2', '3', '4', '5', '6'] as $grade)
                        <option value="{{ $grade }}" {{ request('grade') == $grade ? 'selected' : '' }}>
                            {{ $grade }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md">
                <select name="subject" class="form-control">
                    <option value="">{{ __('Select Subject') }}</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject }}" {{ request('subject') == $subject ? 'selected' : '' }}>
                            {{ $subject }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md">
                <select name="skill" class="form-control">
                    <option value="">{{ __('Select Skill') }}</option>
                    @foreach ($skills as $skill)
                        <option value="{{ $skill }}" {{ request('skill') == $skill ? 'selected' : '' }}>
                            {{ $skill }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            @auth
                <div class="col-md-2 my-1">
                    <a href="{{ route('create') }}" class="btn btn-success w-100">
                        <i class="bi bi-plus-circle"></i> {{ __('Add') }}
                    </a>
                </div>
            @endauth

            <div class="col-md-2 my-1">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> {{ __('Search') }}
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
            <div class="card mb-4">
                <div class="card-body">
                    <dl class="row">
                        @if (!empty($question->question))
                            <dt class="col-sm-3">{{ __('Question') }}:</dt>
                            <dd class="col-sm-9">{{ $question->question }}</dd>
                        @endif

                        @if (!empty($question->answer))
                            <dt class="col-sm-3">{{ __('Answer') }}:</dt>
                            <dd class="col-sm-9">{{ $question->answer }}</dd>
                        @endif

                        @if (!empty($question->grade))
                            <dt class="col-sm-3">{{ __('Grade') }}:</dt>
                            <dd class="col-sm-9">
                                {{ is_array($question->grade) ? implode(', ', $question->grade) : $question->grade }}
                            </dd>
                        @endif

                        @if (!empty($question->subject))
                            <dt class="col-sm-3">{{ __('Subject') }}:</dt>
                            <dd class="col-sm-9">{{ $question->subject }}</dd>
                        @endif

                        @if (!empty($question->skill))
                            <dt class="col-sm-3">{{ __('Skill') }}:</dt>
                            <dd class="col-sm-9">{{ $question->skill }}</dd>
                        @endif

                        @if (!empty($question->source))
                            <dt class="col-sm-3">{{ __('Source') }}:</dt>
                            <dd class="col-sm-9">{{ $question->source }}</dd>
                        @endif

                        @if (!empty($question->book))
                            <dt class="col-sm-3">{{ __('Read') }}:</dt>
                            <dd class="col-sm-9">{{ $question->book }}</dd>
                        @endif
                    </dl>
                    @auth
                        <div class="row text-center mt-3 print-hidden">
                            <div class="col-12">
                                <a href="{{ route('edit', $question) }}" class="btn btn-warning mx-1">
                                    <i class="bi bi-pencil-square"></i> {{ __('Edit') }}
                                </a>

                                <a href="{{ route('delete', $question) }}" class="btn btn-danger mx-1">
                                    <i class="bi bi-trash"></i> {{ __('Delete') }}
                                </a>
                            </div>
                        </div>
                    @endauth
                    </div>
            </div>
        @endforeach
    </div>

    {{ $questions->links() }}
</x-layout>
