<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 50px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title> Employee Company Details</title>
</head>

<body>
    @extends('admin.layout.layout')
    @section('content')
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 center-screen">
                    <h1 class="text-center">ADD EMPLOYEE Company DETAILS</h1>
                </div>
            </div>

            <nav class="navbar navbar-expand-sm bg-dark">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <p class="nav-link text-light" href="#">ADD EMPLOYEES Company DETAILS</p>
                        </li>
                </div>
            </nav>
            <div class="container">
                <div class="text-end">
                    <a class="btn btn-dark mt-2" href="{{ URL('admin/viewEmployeeCompanyDetail') }}">VIEW EMPLOYEES
                        DETAILS</a>
                </div>
            </div>

            <div class="row ">
                <div class="col-sm-5 ms-5">
                    <form method="POST" action="{{ route('storeEmployeeCompanyDetail') }}">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-container">
                                        <h2 class="text-center mb-4">Employee Details Form</h2>
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input type="text" class="form-control" id="salary"
                                                placeholder="Enter salary" name="salary">
                                        </div>
                                        <div class="form-group">
                                            <label for="attendance">Attendace</label>
                                            <input type="text" class="form-control" id="attendance"
                                                placeholder="Enter attendace" name="attendance">
                                        </div>
                                        <div class="form-group">
                                            <label for="position">Position</label>
                                            <input type="text" class="form-control" id="position"
                                                placeholder="Enter position" name="position">
                                        </div>


                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>

    </html>
@endsection
