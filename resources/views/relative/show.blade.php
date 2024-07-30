<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="students.index"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Students List"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <title>Parent Details</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        </head>
        <body>
        <div class="container">
            <h1>Parent Details</h1>

            <a href="{{ route('relatives.index') }}" class="btn btn-secondary mb-3">Back to List</a>

            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $relative->id }}</p>
                    <p><strong>Father Name:</strong> {{ $relative->father_name }}</p>
                    <p><strong>Mother Name:</strong> {{ $relative->mother_name }}</p>
                    <p><strong>Phone Father:</strong> {{ $relative->phone_father }}</p>
                    <p><strong>Phone Mother:</strong> {{ $relative->phone_mother }}</p>
                    <p><strong>Email:</strong> {{$relative->email}}</p>
                    <p><strong>Address:</strong> {{ $relative->address }}</p>
                    <p><strong>Job Father:</strong> {{ $relative->job_father }}</p>
                    <p><strong>Job Mother:</strong> {{ $relative->job_mother }}</p>
                    <p><strong>Cin Father:</strong> {{ $relative->cin_father }}</p>
                    <p><strong>Cin Mother:</strong> {{ $relative->cin_mother }}</p>
                </div>
            </div>
        </div>
        </body>
    </main>
    <x-plugins></x-plugins>

</x-layout>

