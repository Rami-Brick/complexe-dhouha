<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Parent</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Optional: Add your CSS here -->
</head>
<body>
<div class="container">
    <h1>Edit Parent</h1>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <a href="{{ route('relatives.index') }}">Back</a>

    <form action="{{ route('relatives.update', $relative->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="father_name">Father Name</label>
            <input type="text" id="father_name" name="father_name" class="form-control" value="{{ $relative->father_name }}" required>
        </div>

        <div class="form-group">
            <label for="mother_name">Mother Name</label>
            <input type="text" id="mother_name" name="mother_name" class="form-control" value="{{ $relative->mother_name }}" required>
        </div>

        <div class="form-group">
            <label for="phone_father">Father phone number</label>
            <input type="text" id="phone_father" name="phone_father" class="form-control" value="{{ $relative->phone_father }}" required>
        </div>

        <div class="form-group">
            <label for="phone_mother">Mother phone number</label>
            <input type="text" id="phone_mother" name="phone_mother" class="form-control" value="{{ $relative->phone_mother }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" value="{{ $relative->email }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ $relative->address }}" required>
        </div>

        <div class="form-group">
            <label for="job_father">Job father</label>
            <input type="text" id="job_father" name="job_father" class="form-control" value="{{ $relative->job_father }}" required>
        </div>

        <div class="form-group">
            <label for="job_mother">Job mother</label>
            <input type="text" id="job_mother" name="job_mother" class="form-control" value="{{ $relative->job_mother }}" required>
        </div>

        <div class="form-group">
            <label for="cin_father">Cin father</label>
            <input type="text" id="cin_father" name="cin_father" class="form-control" value="{{ $relative->cin_father }}" required>
        </div>

        <div class="form-group">
            <label for="cin_mother">Cin mother</label>
            <input type="text" id="cin_mother" name="cin_mother" class="form-control" value="{{ $relative->cin_mother }}" required>
        </div>

        <div class="form-group">
            <label for="notes">Notes</label>
            <input type="text" id="notes" name="notes" class="form-control" value="{{ $relative->notes }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </form>
</div>
</body>
</html>
