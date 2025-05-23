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
                    <select name="grade_level" class="form-control">
                        <option value="">Select Grade Level</option>
                        <option value="PK" {{ request('grade_level') == 'PK' ? 'selected' : '' }}>PK</option>
                        <option value="K" {{ request('grade_level') == 'K' ? 'selected' : '' }}>K</option>
                        <option value="1" {{ request('grade_level') == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ request('grade_level') == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ request('grade_level') == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ request('grade_level') == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ request('grade_level') == '5' ? 'selected' : '' }}>5</option>
                        <option value="6" {{ request('grade_level') == '6' ? 'selected' : '' }}>6</option>
                        <option value="7" {{ request('grade_level') == '7' ? 'selected' : '' }}>7</option>
                        <option value="8" {{ request('grade_level') == '8' ? 'selected' : '' }}>8</option>
                        <option value="9" {{ request('grade_level') == '9' ? 'selected' : '' }}>9</option>
                        <option value="10" {{ request('grade_level') == '10' ? 'selected' : '' }}>10</option>
                        <option value="11" {{ request('grade_level') == '11' ? 'selected' : '' }}>11</option>
                        <option value="12" {{ request('grade_level') == '12' ? 'selected' : '' }}>12</option>
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

        <table class="table">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Grade Level</th>
                    <th>Subject</th>
                    <th>Source</th>
                    @if(request()->has('admin'))
                        <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->answer }}</td>
                        <td>{{ implode(', ', $question->grade_level) }}</td>
                        <td>{{ $question->subject }}</td>
                        <td>{{ $question->source }}</td>
                        @if(request()->has('admin'))
                            <td>
                                <a href="{{ route('edit', $question->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('delete', $question->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $questions->appends(request()->except('page'))->links() }}
    </div>
    @endsection
</body>
</html>