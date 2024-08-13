<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="relative.create"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <x-navbars.navs.auth titlePage="Create Relative"></x-navbars.navs.auth>
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" type="text/css" >
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-body">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    <form action="{{ route('relatives.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="father_name">Father Name</label>
            <input type="text" id="father_name" name="father_name" class="form-control" >
        </div>

        <div class="form-group">
            <label for="mother_name">Mother Name</label>
            <input type="text" id="mother_name" name="mother_name" class="form-control" >
        </div>

        <div class="form-group">
            <label for="phone_father">Father phone number</label>
            <input type="text" id="phone_father" name="phone_father" class="form-control" >
        </div>

        <div class="form-group">
            <label for="phone_mother">Mother phone number</label>
            <input type="text" id="phone_mother" name="phone_mother" class="form-control" >
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" >
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" class="form-control" >
        </div>

        <div class="form-group">
            <label for="job_father">Job father</label>
            <input type="text" id="job_father" name="job_father" class="form-control" >
        </div>

        <div class="form-group">
            <label for="job_mother">Job mother</label>
            <input type="text" id="job_mother" name="job_mother" class="form-control" >
        </div>

        <div class="form-group">
            <label for="cin_father">Cin father</label>
            <input type="text" id="cin_father" name="cin_father" class="form-control" >
        </div>

        <div class="form-group">
            <label for="cin_mother">Cin mother</label>
            <input type="text" id="cin_mother" name="cin_mother" class="form-control" >
        </div>

        <div class="form-group">
            <label for="notes">Notes</label>
            <input type="text" id="notes" name="notes" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
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

