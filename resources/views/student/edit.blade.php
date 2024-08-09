<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="students.edit"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <x-navbars.navs.auth titlePage="Edit Student"></x-navbars.navs.auth>
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" type="text/css" >
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-body">
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

                            <a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">Back</a>

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
            <select id="gender" name="gender" class="custom-select" required>
                <option value="boy" {{ $student->gender == 'boy' ? 'selected' : '' }}>Boy</option>
                <option value="girl" {{ $student->gender == 'girl' ? 'selected' : '' }}>Girl</option>
            </select>
        </div>

        <div class="form-group">
            <label for="course_id">Course</label>
            <select name="course_id" id="course_id" class="custom-select">
                <option value="">Select a course</option>
                @foreach ($courses as $course)
                <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="relative_id">Parent</label>
            <select name="relative_id" id="relative_id" class="custom-select">
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
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

