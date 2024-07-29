<!-- resources/views/students/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parents List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Optional: Add your CSS here -->
</head>
<body>
<div class="container">
    <h1>Parents List</h1>

    <!-- Button to create a new student -->
    <a href="{{ route('relatives.create') }}" class="btn btn-primary mb-3">Add New Parent</a>

    <!-- Display students in a table -->
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Father Name</th>
            <th>Mother Name</th>
            <th>Phone Father</th>
            <th>Phone Mother</th>
            <th>Email</th>
            <th>Address</th>
            <th>Job Father</th>
            <th>Job Mother</th>
            <th>Cin Father</th>
            <th>Cin Mother</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($relatives as $relative)
        <tr>
            <td>{{ $relative->id }}</td>
            <td>{{ $relative->father_name }}</td>
            <td>{{ $relative->mother_name }}</td>
            <td>{{ $relative->phone_father }}</td>
            <td>{{ $relative->phone_mother }}</td>
            <td>{{ $relative->email }}</td>
            <td>{{ $relative->address }}</td>
            <td>{{ $relative->job_father }}</td>
            <td>{{ $relative->job_mother }}</td>
            <td>{{ $relative->cin_father }}</td>
            <td>{{ $relative->cin_mother }}</td>
            <td>
                <a href="{{ route('relatives.edit', $relative->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('relatives.destroy', $relative->id) }}" method="POST" style="display:inline;">
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
