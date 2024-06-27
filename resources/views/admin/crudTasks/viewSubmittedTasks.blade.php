<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Task Details</title>
</head>

<body>
    @extends('admin.layout.layout')
    @section('content')
        <div class="content-wrapper">
            <h1 class="text-center">VIEW TASKS</h1>
            <nav class="navbar navbar-expand-sm bg-dark">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="#">FOR TASK DETAILS VIEW</a>
                    </li>
                </ul>
            </nav>


            <div class="container mt-3 ">
                <table class="table table-hover table-success">
                    <thead>
                        <tr>
                            <th>Task Number</th>
                            <th>Task NAME</th>
                            <th>Task Description</th>
                            <th>Task Submission Date</th>
                            <th>Task file</th>
                            <th>View Task file</th>
                            <th>Download Task file</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskData as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->date }}</td>
                                <td>{{ substr($data->file, 14) }}</td>

                                <td><a href="{{ URL::to('admin/taskFileView', $data->id) }}">VIEW FILE</a></td>
                                <td><a href="{{ URL::to('admin/taskFileDownload', $data->file) }}">Download FILE</a></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</body>

</html>
