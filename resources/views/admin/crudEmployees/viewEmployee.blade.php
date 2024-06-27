<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Employee Details</title>
    <style>
        body {
            margin-left: 15%;
            margin-right: 15%;
            margin-top: 5%;
            background: url({{ URL::asset('1.png') }}) no-repeat center center fixed;
            background-size: 100%;
        }

        fieldset {
            background-color: rgb(235, 235, 235);
            padding: 30px;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        h1 {
            color: blue;
            text-align: center;
            border: 5px solid red;
            background-color:
                rgb(235, 235, 235);
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
    </style>
</head>

<body>
    @extends('admin.layout.layout')
    @section('content')
        <div class="content-wrapper">
            <h1 class="text-center">VIEW REGISTERED EMPLOYEES</h1>
            <nav class="navbar navbar-expand-sm bg-dark">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="#">FOR EMPLOYEE DETAILS VIEW</a>
                    </li>
                </ul>
            </nav>
            @php
                $i = 1;
            @endphp
            <div class="container">
                <div class="text-end">
                    <a class="btn btn-dark mt-2" href="{{ URL('admin/addEmployee') }}">REGISTER NEW EMPLOYEE</a>
                </div>

            </div>
            <div class="container mt-3 ">
                <table id="EmpTable" class="table table-striped table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>Employee Number</th>
                            <th>Employee NAME</th>
                            <th>Employee Email</th>
                            <th>Employee Type</th>
                            <th>Employee Date Of Birth</th>
                            <th>Employee address</th>
                            <th>Employee Attendance</th>
                            <th>Employee Salary</th>
                            <th>Employee Position</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employeeData as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->type }}</td>
                                <td>{{ $data->dateofbirth }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->attendance }}</td>
                                <td>{{ $data->salary }}</td>
                                <td>{{ $data->position }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm "
                                        href="employee/{{ $data->id }}/editEmployee">EDIT</a>
                                    <form method="POST" class="d-inline"
                                        action="employee/{{ $data->id }}/deleteEmployee">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-
                        pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#EmpTable').DataTable({
                    "pagingType": "full_numbers",
                    "lengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "All"]
                    ],
                    responsive: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search",
                    }
                });
            });
        </script>
    @endsection
</body>

</html>
