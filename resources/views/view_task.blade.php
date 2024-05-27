<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>View Tasks</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Tasks</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table for incomplete tasks -->
        <h4 style="font-weight:bold; color: red;">Incomplete Tasks:</h4>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sl no</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Mark as</th>
                    <th scope="col">Action</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Last updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incompleteTasks as $key=>$task)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td style="color:red; font-weight: bold;">{{ $task->is_completed ? 'Completed' : 'Incomplete' }}</td>
                        <td>
                            @if (!$task->is_completed)
                                <form action="{{ route('task.complete', $task->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Complete</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('task.delete', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mr-1">Delete</button>
                            </form>
                            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($task->created_at)->format('m/d/Y H:i:s') }}</td>
                        <td>{{ \Carbon\Carbon::parse($task->updated_at)->format('m/d/Y H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Table for completed tasks -->
        <h4 style="font-weight:bold; color: green;">Completed Tasks:</h4>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sl no</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Mark as</th>
                    <th scope="col">Action</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Last updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($completedTasks as $key=> $task)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td style="color:green; font-weight: bold;">{{ $task->is_completed ? 'Completed' : 'Incomplete' }}</td>
                        <td>
                            @if ($task->is_completed)
                                <form action="{{ route('task.incomplete', $task->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Incomplete</button>
                                </form>
                            @endif
                        </td>
                        
                        <td>
                            <form action="{{ route('task.delete', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($task->created_at)->format('m/d/Y H:i:s') }}</td>
                        <td>{{ \Carbon\Carbon::parse($task->updated_at)->format('m/d/Y H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{route('task.create')}}"><button type="button" class="btn btn-dark mb-2">Create new task</button></a>
    </div>
    @include('components.footer')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
