<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="students.index"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <x-navbars.navs.auth titlePage="Students List"></x-navbars.navs.auth>

        <title>Course Details</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        </head>
        <body>
        <div class="container">
            <h1>Course Details</h1>

            <a href="{{ route('courses.index') }}" class="btn btn-secondary mb-3">Back to List</a>

            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $course->id }}</p>
                    <p><strong>Course Name:</strong> {{ $course->course_name }}</p>
                    <p><strong>Level:</strong> {{ $course->level }}</p>
                    <p><strong>staff:</strong> {{ $course->staff_id }}</p>
                </div>
            </div>
        </div>
        </body>
    </main>
    <x-plugins></x-plugins>

</x-layout>

