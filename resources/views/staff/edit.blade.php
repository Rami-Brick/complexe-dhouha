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
    <h1>Edit Staff</h1>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <a href="{{ route('staff.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('staff.update', $staff->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Staff Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $staff->name }}" required>
        </div>
        <div class="form-group">
                <label for="name">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ $staff->phone }}" required>
        </div>
        <div class="form-group">
                <label for="name">Email</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ $staff->email }}" required>
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
