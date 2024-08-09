<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="staff.index"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <x-navbars.navs.auth titlePage="Staff List"></x-navbars.navs.auth>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class=" me-3 my-3 text-end">
                            <a href="{{ route('staff.create') }}" class="btn bg-gradient-dark mb-0" href="javascript:;"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                Staff</a>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Staff Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($staffs as $staff)
        <tr>
            <td>{{ $staff->id }}</td>
            <td><a href="{{ route('staff.show', $staff->id) }}">{{ $staff->name }}</td>
            <td>{{ $staff->phone }}</td>
            <td>{{ $staff->email }}</td>
            <td><a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" style="display:inline;">
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
