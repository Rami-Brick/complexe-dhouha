@props(['titlePage'])

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" type="text/css" >
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bolder mb-0">{{ $titlePage }}</h6>
        </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <form action="{{ route('students.index') }}" method="GET" class="d-flex">
                        <div class="input-group input-group-outline @if(request('search')) is-filled @endif" style="width: auto">
                            <label class="form-label">Search...</label>
                            <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}" autocomplete="off">
                            <div id="searchResults" class="autocomplete-results"></div>
                        </div>
                        <button type="submit" class="btn btn-primary ms-2">
                            <i class="material-icons opacity-10">search</i>
                            Search</button>
                        <button type="button" class="btn btn-secondary ms-2" onclick="window.location='{{ route('students.index') }}'">
                            <i class="material-icons opacity-10">close</i>
                            </button>
                    </form>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#search').on('keyup', function() {
                                var query = $(this).val();
                                if (query.length > 0) {
                                    $.ajax({
                                        url: "{{ route('autocomplete') }}",
                                        type: "GET",
                                        data: { 'query': query },
                                        success: function(data) {
                                            $('#searchResults').empty();
                                            if(data.length > 0){
                                                data.forEach(function(student){
                                                    var courseName = student.course ? student.course.name : 'No course';
                                                    var relativeName = student.relative
                                                        ? (student.relative.father_name ? student.relative.father_name : student.relative.mother_name)
                                                        : 'No relative';

                                                    $('#searchResults').append(
                                                        '<div class="autocomplete-item" data-id="' + student.id + '">' +
                                                        student.first_name + ' ' + student.last_name + ' - ' +
                                                        courseName + ' - ' + relativeName +
                                                        '</div>'
                                                    );
                                                });
                                            } else {
                                                $('#searchResults').append('<div class="autocomplete-item">No results found</div>');
                                            }
                                        }
                                    });
                                } else {
                                    $('#searchResults').empty();
                                }
                            });

                            $(document).on('click', '.autocomplete-item', function(){
                                var studentId = $(this).data('id');
                                var url = "{{ route('students.show', ':id') }}";
                                url = url.replace(':id', studentId);
                                window.location.href = url;
                            });
                        });
                    </script>


                    <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout-form">
                        @csrf
                    </form>

            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:" class="nav-link text-body font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign
                            Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
