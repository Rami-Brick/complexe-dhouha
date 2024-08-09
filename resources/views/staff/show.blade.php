<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="staff.index"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <x-navbars.navs.auth titlePage="Staff List"></x-navbars.navs.auth>

        <title>Staff Details</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        </head>
        <body>
        <div class="container">
            <h1>Staff Details</h1>

            <a href="{{ route('staff.index') }}" class="btn btn-secondary mb-3">Back to List</a>

            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $staff->id }}</p>
                    <p><strong>Staff Name:</strong> {{ $staff->name }}</p>
                    <p><strong>Phone:</strong> {{ $staff->phone }}</p>
                    <p><strong>Email:</strong> {{ $staff->email }}</p>
                </div>
            </div>
        </div>
        </body>
    </main>
    <x-plugins></x-plugins>

</x-layout>

