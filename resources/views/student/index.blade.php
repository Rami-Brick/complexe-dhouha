<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>Students List</h1>


    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Student</a>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Course</th>
            <th>Parent</th>
            <th>Payment Status</th>
            <th>Leave With</th>
            <th>Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->first_name }}</td>
            <td>{{ $student->last_name }}</td>
            <td>{{ $student->birth_date }}</td>
            <td>{{ $student->gender }}</td>
            <td>{{ $student->course ? $student->course->course_name : 'N/A' }}</td>
            <td>{{ $student->relative ? $student->relative->father_name : 'N/A' }}</td>
            <td>{{ $student->payment_status }}</td>
            <td>{{ $student->leave_with }}</td>
            <td>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?');">Delete</button>
                </form>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
