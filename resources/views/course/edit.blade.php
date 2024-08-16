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

    <a href="{{ route('courses.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Course Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $course->name }}" required>
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
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
