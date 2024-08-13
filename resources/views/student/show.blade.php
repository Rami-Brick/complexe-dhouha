<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="students.index"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Students List"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <title>Student Details</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        </head>
        <body>
        <div class="container">
            <h1>Student Details</h1>

            <a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">Back to List</a>

            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $student->id }}</p>
                    <p><strong>First Name:</strong> {{ $student->first_name }}</p>
                    <p><strong>Last Name:</strong> {{ $student->last_name }}</p>
                    <p><strong>Birth Date:</strong> {{ $student->birth_date }}</p>
                    <p><strong>Gender:</strong> {{ $student->gender }}</p>
                    <p><strong>Course:</strong> {{ $student->course ? $student->course->name : 'N/A' }}</p>
                    <p><strong>Parent:</strong> {{ $student->relative ? $student->relative->father_name : 'N/A' }}</p>
                    <p><strong>Payment Status:</strong> {{ $student->payment_status }}</p>
                    <p><strong>Leave With:</strong> {{ $student->leave_with }}</p>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?');">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        </body>

    </main>
    <x-plugins></x-plugins>

</x-layout>
