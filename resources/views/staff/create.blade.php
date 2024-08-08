<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="staff.create"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <x-navbars.navs.auth titlePage="Create Staff"></x-navbars.navs.auth>
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
                            <form action="{{ route('staff.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Staff Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="text" id="email" name="email" class="form-control" required>
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
