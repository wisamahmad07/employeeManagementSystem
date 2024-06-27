<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Employee Details</title>
    <style>
        .list-group-item {
            background-color: #f8f9fa;
            /* Background color */
            border: 1px solid #dee2e6;
            /* Border color */
            border-radius: 0.25rem;
            /* Border radius */
            margin-bottom: 1.5rem;
            /* Margin between items */
        }
    </style>
</head>

<body>
    @extends('employee.layout.layout')
    @section('content')
        <div class="content-wrapper">
            <h1 class="text-center">VIEW YOUR DETAIL</h1>
            <nav class="navbar navbar-expand-sm bg-dark">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="#">FOR EMPLOYEE DETAILS VIEW</a>
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

            <div class="container-lg mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row row-cols-1 row-cols-md-3 g-4" style="width: 2000px;height:400px">
                            @foreach ($employeeData as $data)
                                @if ($data->email == Auth::guard('employee')->user()->email)
                                    <div class="col">
                                        <div class="card h-100 border-primary">
                                            <div class="card-body">
                                                <h5 class="card-title text-uppercase" style="color: green">
                                                    {{ $data->name }}</h5>
                                                <hr>
                                                <ul class="list-group ">
                                                    <li class="list-group-item text-white text-center">Employee Email:
                                                        {{ $data->email }}</li>
                                                    <li class="list-group-item text-white text-center">Employee Job:
                                                        {{ $data->type }}</li>
                                                    <li class="list-group-item text-white text-center">Salary:
                                                        {{ $data->salary }}</li>
                                                    <li class="list-group-item text-white text-center">Position:
                                                        {{ $data->position }}</li>
                                                    <li class="list-group-item text-white text-center">Attendance:
                                                        {{ $data->attendance }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
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
