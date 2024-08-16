@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" type="text/css" >
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a style="height: 100%" href=" {{ route('students.index') }} ">
            <img src="{{ asset('assets') }}/img/logo-complexe.png" style="height: 2.5rem; margin-top: 25px;" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white"></span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Menu</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'students.index' ? 'active bg-gradient-primary' : '' }} "
                   href="{{ route('students.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">child_care</i>
                    </div>
                    <span class="nav-link-text ms-1">Students List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'relatives.index' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('relatives.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">group</i>
                    </div>
                    <span class="nav-link-text ms-1">Parents</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'courses.index' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('courses.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">school</i>
                    </div>
                    <span class="nav-link-text ms-1">Courses</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'staff.index' ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('staff.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment_ind</i>
                    </div>
                    <span class="nav-link-text ms-1">Staff</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
