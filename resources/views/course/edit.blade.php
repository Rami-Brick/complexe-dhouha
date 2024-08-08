<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Optional: Add your CSS here -->
</head>
<body>
<div class="container">
    <h1>Edit Course</h1>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <a href="{{ route('courses.index') }}">Back</a>

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" id="course_name" name="course_name" class="form-control" value="{{ $course->course_name }}" required>
        </div>

        <div class="form-group">
            <label for="level">Level</label>
            <select id="level" name="level" class="form-control" required>
                <option value="">Select Level</option>
                <option value="bébé" {{ old('level', $course->level) == 'bébé' ? 'selected' : '' }}>Bébé</option>
                <option value="1-2 ans" {{ old('level', $course->level) == '1-2 ans' ? 'selected' : '' }}>1-2 ans</option>
                <option value="2-3 ans" {{ old('level', $course->level) == '2-3 ans' ? 'selected' : '' }}>2-3 ans</option>
                <option value="3 ans" {{ old('level', $course->level) == '3 ans' ? 'selected' : '' }}>3 ans</option>
                <option value="4 ans" {{ old('level', $course->level) == '4 ans' ? 'selected' : '' }}>4 ans</option>
                <option value="5 ans" {{ old('level', $course->level) == '5 ans' ? 'selected' : '' }}>5 ans</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </form>
</div>
</body>
</html>
