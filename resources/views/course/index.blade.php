<!-- resources/views/students/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>Courses List</h1>


<!--    <a href="{{ route('relatives.create') }}" class="btn btn-primary mb-3">Add New Parent</a>-->

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Level</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->course_name }}</td>
            <td>{{ $course->level }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
