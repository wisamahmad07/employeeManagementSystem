<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Employee Company Details</title>
</head>

<body>
    @extends('admin.layout.layout')
    @section('content')
        <div class="content-wrapper">
            <h1 class="text-center">VIEW EMPLOYEE COMPANY DETAIL</h1>
            <nav class="navbar navbar-expand-sm bg-dark">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="#">FOR EMPLOYEE COMPANY DETAILS VIEW</a>
                    </li>
                </ul>
            </nav>

            <div class="container">
                <div class="text-end">
                    <a class="btn btn-dark mt-2" href="{{ URL('admin/addEmployeeCompanyDetail') }}">REGISTER NEW EMPLOYEE
                        COMPANY
                        DETAILS</a>
                </div>

            </div>
            <div class="container mt-3 ">
                <table class="table table-hover table-success">
                    <thead>
                        <tr>
                            <th>Employee Number</th>
                            <th>Employee NAME</th>
                            <th>Employee SALARY</th>
                            <th>Employee POSITION</th>
                            <th>Employee ATTENDANCE</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employeeCompanyData as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->salary }}</td>
                                <td>{{ $data->position }}</td>
                                <td>{{ $data->attendance }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm "
                                        href="employee/{{ $data->id }}/editEmployeeCompanyDetail">EDIT</a>
                                    <form method="POST" class="d-inline"
                                        action="employee/{{ $data->id }}/deleteEmployeeCompanyDetail">
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
    @endsection
</body>

</html>
