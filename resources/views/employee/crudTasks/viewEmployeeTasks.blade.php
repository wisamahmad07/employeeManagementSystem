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
    @extends('employee.layout.layout')
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
            @if ($errors->any())
                <div class="alert alert-danger" id="errorAlert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="container mt-3 ">
                <table class="table table-hover table-success">
                    <thead>
                        <tr>
                            <th>Task Number</th>
                            <th>Task NAME</th>
                            <th>Task Description</th>
                            <th>Task Submission Date</th>
                            <th>Task file</th>
                            <th>Task submit</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskData as $data)
                            @if ($data->email == Auth::guard('employee')->user()->email)
                                @if (!empty($data->description))
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td>{{ $data->date }}</td>

                                        @if (!empty($data->file))
                                            <td class="bg-success">{{ substr($data->file, 14) }} Uploaded Sucessfully</td>
                                            <td class="bg-success">Status is okay</td>
                                        @else
                                            <!-- File not uploaded, display the form to upload the file -->
                                            <form method="POST" class="d-inline"
                                                action="storeEmployeeTask/{{ $data->id }}/add"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <td> <input type="file" name="file"></td>
                                                <td> <button type="submit" class="btn btn-success btn-sm">SUBMIT
                                                        TASK</button>
                                                </td>
                                            </form>
                                        @endif
                                @endif

                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- JavaScript to remove the error message after 3 seconds -->
            <script>
                // Wait for the DOM content to load
                document.addEventListener('DOMContentLoaded', function() {
                    // Find the error alert element
                    const errorAlert = document.getElementById('errorAlert');
                    // Check if the error alert exists
                    if (errorAlert) {
                        // Set a timeout to remove the error alert after 3 seconds
                        setTimeout(function() {
                            errorAlert.remove(); // Remove the error alert
                        }, 3000); // 3000 milliseconds = 3 seconds
                    }
                });
            </script>
        @endsection
    </div>
</body>

</html>
