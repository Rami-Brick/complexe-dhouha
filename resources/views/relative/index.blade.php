<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="relatives.index"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Relatives List"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class=" me-3 my-3 text-end">
                            <a href="{{ route('relatives.create') }}" class="btn bg-gradient-dark mb-0" href="javascript:;"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                Relative</a>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Father Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Mother Name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Phone Father</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Phone mother</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                               email
                                            </th>
<!--                                            <th-->
<!--                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">-->
<!--                                               address-->
<!--                                            </th>-->
<!--                                            <th class="text-secondary opacity-7"></th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($relatives as $relative)
                                    <tr>
                                        <td>{{ $relative->id }}</td>
                                        <td><a href="{{ route('relatives.show', $relative->id) }}">{{ $relative->father_name }}</td>
                                        <td><a href="{{ route('relatives.show', $relative->id) }}">{{ $relative->mother_name }}</td>
                                        <td>{{ $relative->phone_father }}</td>
                                        <td>{{ $relative->phone_mother }}</td>
                                        <td>{{ $relative->email }}</td>
<!--                                        <td>{{ $relative->address }}</td>-->
<!--                                        <td>{{ $relative->job_father }}</td>-->
<!--                                        <td>{{ $relative->job_mother }}</td>-->
<!--                                        <td>{{ $relative->cin_father }}</td>-->
<!--                                        <td>{{ $relative->cin_mother }}</td>-->
                                        <td>
                                            <a href="{{ route('relatives.edit', $relative->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('relatives.destroy', $relative->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
