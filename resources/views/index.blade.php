<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Search</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @extends('app')

    @section('content')
    <div class="container">
        <h1>Search Questions</h1>

        <form method="GET" action="{{ route('index') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search .." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <select name="grade" class="form-control">
                        <option value="">Select Grade</option>
                        <option value="PK" {{ request('grade') == 'PK' ? 'selected' : '' }}>PK</option>
                        <option value="K" {{ request('grade') == 'K' ? 'selected' : '' }}>K</option>
                        <option value="1" {{ request('grade') == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ request('grade') == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ request('grade') == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ request('grade') == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ request('grade') == '5' ? 'selected' : '' }}>5</option>
                        <option value="6" {{ request('grade') == '6' ? 'selected' : '' }}>6</option>
                        <option value="7" {{ request('grade') == '7' ? 'selected' : '' }}>7</option>
                        <option value="8" {{ request('grade') == '8' ? 'selected' : '' }}>8</option>
                        <option value="9" {{ request('grade') == '9' ? 'selected' : '' }}>9</option>
                        <option value="10" {{ request('grade') == '10' ? 'selected' : '' }}>10</option>
                        <option value="11" {{ request('grade') == '11' ? 'selected' : '' }}>11</option>
                        <option value="12" {{ request('grade') == '12' ? 'selected' : '' }}>12</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ request('subject') }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Search</button>
        </form>

        @if(request()->has('admin'))
            <a href="{{ route('create') }}" class="btn btn-success mb-3">Add Question</a>
        @endif

        @foreach($questions as $question)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-auto font-weight-bold question-label">Question:</div>
                        <div class="col">{{ $question->question }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-auto font-weight-bold question-label">Answer:</div>
                        <div class="col">{{ $question->answer }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-auto font-weight-bold question-label">Grade:</div>
                        <div class="col">{{ is_array($question->grade) ? implode(', ', $question->grade) : $question->grade }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-auto font-weight-bold question-label">Subject:</div>
                        <div class="col">{{ $question->subject }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-auto font-weight-bold question-label">Source:</div>
                        <div class="col">{{ $question->source }}</div>
                    </div>
                    @if(request()->has('admin'))
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('edit', $question->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('delete', $question->id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach

        {{ $questions->appends(request()->except('page'))->links() }}
    </div>
    @endsection
</body>
</html>