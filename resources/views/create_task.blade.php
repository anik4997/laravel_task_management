<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Create Task</title>
    <style>
        .row {
            margin-right: 0px; 
            margin-left: 0px;
            }
    </style>
</head>
<body>
    <h1 class="text-center mb-4" style="font-weight:bold;">Welcome To the <span style="color:blue;">TO DO</span> app of</h1>
    <h3 class="text-center mb-4 mt-4" style="font-weight:bold; color:red;">(American Center of Regenerative Health and Research)</h3>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-4 p-3" style="background-color: #343a40; color: white">Create Task</h1>
                    <form action="{{ route('task.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Task Title</label>
                            <input type="text" name="title" class="form-control" id="formGroupExampleInput" required>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Task Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('task.view')}}"><button type="button" class="btn btn-secondary">View all tasks</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
