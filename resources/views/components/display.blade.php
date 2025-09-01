@props(['question'])

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
        {{ $slot }}
    </div>
</div>