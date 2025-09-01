@use('App\Models\Question')

<div class="row mb-1">
    <div class="col-12 col-md my-1">
        <input type="text" name="search" class="form-control" placeholder="Search Term ..."
            value="{{ request('search') }}">
    </div>

    <div class="col-12 col-md my-1">
        <select name="grade" class="form-control">
            <option value="">{{ __('Select Grade') }}</option>
            @foreach (['PK', 'K', '1', '2', '3', '4', '5', '6'] as $grade)
                <option value="{{ $grade }}" {{ request('grade') == $grade ? 'selected' : '' }}>
                    {{ $grade }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-12 col-md my-1">
        <select name="subject" class="form-control">
            <option value="">{{ __('Select Subject') }}</option>
            @foreach (Question::whereNotNull('subject')->distinct()->orderBy('subject')->pluck('subject') as $subject)
                <option value="{{ $subject }}" {{ request('subject') == $subject ? 'selected' : '' }}>
                    {{ $subject }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-12 col-md my-1">
        <select name="skill" class="form-control">
            <option value="">{{ __('Select Skill') }}</option>
            @foreach (Question::whereNotNull('skill')->distinct()->orderBy('skill')->pluck('skill') as $skill)
                <option value="{{ $skill }}" {{ request('skill') == $skill ? 'selected' : '' }}>
                    {{ $skill }}</option>
            @endforeach
        </select>
    </div>
</div>