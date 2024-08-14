<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="students.index"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" type="text/css" >

        <x-navbars.navs.auth titlePage="Students List"></x-navbars.navs.auth>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="me-3 my-3 text-end">
                            <a href="{{ route('students.create') }}" class="btn bg-gradient-dark mb-0">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Student
                            </a>
                        </div>

                        <form id="filter-form" action="{{ route('students.index') }}" method="GET" class="d-flex mb-4">
                            <select name="gender" id="gender-filter" class="form-gender" aria-label="Gender filter">
                                <option value="">All</option>
                                <option value="boy" {{ request('gender') == 'boy' ? 'selected' : '' }}>Boy</option>
                                <option value="girl" {{ request('gender') == 'girl' ? 'selected' : '' }}>Girl</option>
                            </select>
                            <select name="course" id="course-filter" class="form-gender ms-2" aria-label="Course filter">
                                <option value="">All Courses</option>
                                @foreach($courses as $course)
                                <option value="{{ $course->name }}" {{ request('course') == $course->name ? 'selected' : '' }}>{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </form>

                        <script>
                            document.getElementById('gender-filter').addEventListener('change', function() {
                                document.getElementById('filter-form').submit();
                            });
                            document.getElementById('course-filter').addEventListener('change', function() {
                                document.getElementById('filter-form').submit();
                            });
                        </script>


                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('id', '#')</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('first_name', 'First name')</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">@sortablelink('last_name', 'Last name')</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('birth_date', 'Birth date')</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('gender', 'Gender')</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('course.name', 'Course')</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Parent</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('created_at', 'Creation')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td><a href="{{ route('students.show', $student->id) }}">{{ $student->first_name }}</a></td>
                                        <td><a href="{{ route('students.show', $student->id) }}">{{ $student->last_name }}</a></td>
                                        <td>{{ \Carbon\Carbon::parse($student->birth_date)->age }} years</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->course ? $student->course->name : 'N/A' }}</td>
                                        <td>{{ $student->relative ? $student->relative->father_name : 'N/A' }}</td>
                                        <td>{{ $student->created_at }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                    {{ $students->appends(request()->all())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

<script>
    function clearFilters() {
        const searchInput = document.querySelector('input[name="search"]');
        const genderSelect = document.querySelector('select[name="gender"]');
        const courseSelect = document.querySelector('select[name="course"]');
        searchInput.value = '';
        genderSelect.value = '';
        courseSelect.value = '';
        document.querySelector('form').submit();
    }
</script>
