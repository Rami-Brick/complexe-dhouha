<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Optional: Add your CSS here -->
</head>

<body>
<div class="container">
    <h1>Create Student</h1>


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

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">First Name</label>
            <input type="text" id="first_name" name="first_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="name">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" id="birth_date" name="birth_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" class="form-control" required>
                <option value="boy">Boy</option>
                <option value="girl">Girl</option>
            </select>
        </div>

        <div class="form-group">
            <label for="course_id">Course</label>
            <select name="course_id" id="course_id" class="form-control">
                <option value="">Select a course</option>
                @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="relative_id">Parent</label>
            <select name="relative_id" id="relative_id" class="form-control">
                <option value="">Select a relative</option>
                @foreach ($relatives as $relative)
                <option value="{{ $relative->id }}">{{ $relative->father_name }}</option>
                @endforeach
            </select>
        </div>

<!--        <div class="form-group">-->
<!--            <label for="relative_id">Relative ID</label>-->
<!--            <input type="number" id="relative_id" name="relative_id" class="form-control">-->
<!--        </div>-->

        <div class="form-group">
            <label for="payment_status">Payment Status</label>
            <input type="text" id="payment_status" name="payment_status" class="form-control" >
        </div>

        <div class="form-group">
            <label for="leave_with">Leave With</label>
            <input type="text" id="leave_with" name="leave_with" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <form method="GET" action="{{ route('relatives.create') }}">
        <button class="text-xs text-gray-400">Add parent</button>
    </form>
</div>
</body>
</html>
