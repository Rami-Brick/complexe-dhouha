<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>Edit Student</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <a href="{{ route('students.index') }}">Back</a>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" class="form-control" value="{{ $student->first_name }}" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ $student->last_name }}" required>
        </div>

        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ $student->birth_date }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" class="form-control" required>
                <option value="boy" {{ $student->gender == 'boy' ? 'selected' : '' }}>Boy</option>
                <option value="girl" {{ $student->gender == 'girl' ? 'selected' : '' }}>Girl</option>
            </select>
        </div>

        <div class="form-group">
            <label for="course_id">Course</label>
            <select name="course_id" id="course_id" class="form-control">
                <option value="">Select a course</option>
                @foreach ($courses as $course)
                <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>{{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="relative_id">Parent</label>
            <select name="relative_id" id="relative_id" class="form-control">
                <option value="">Select a relative</option>
                @foreach ($relatives as $relative)
                <option value="{{ $relative->id }}" {{ $student->relative_id == $relative->id ? 'selected' : '' }}>{{ $relative->father_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="payment_status">Payment Status</label>
            <input type="text" id="payment_status" name="payment_status" class="form-control" value="{{ $student->payment_status }}">
        </div>

        <div class="form-group">
            <label for="leave_with">Leave With</label>
            <input type="text" id="leave_with" name="leave_with" class="form-control" value="{{ $student->leave_with }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <form method="GET" action="{{ route('relatives.create') }}">
        <button class="text-xs text-gray-400">Add parent</button>
    </form>
</div>
</body>
</html>
