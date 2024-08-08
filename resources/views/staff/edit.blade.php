<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff</title>
</head>
<body>
<div class="container">
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

    <a href="{{ route('staff.index') }}">Back</a>

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
</body>
</html>
