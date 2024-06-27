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
    <title>Register Employee</title>
</head>

<body>
    @extends('admin.layout.layout')
    @section('content')
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 center-screen">
                    <h1 class="text-center">REGISTER EMPLOYEES</h1>
                </div>
            </div>

            <nav class="navbar navbar-expand-sm bg-dark">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <p class="nav-link text-light" href="#">ADD EMPLOYEES</p>
                        </li>
                </div>
            </nav>
            <div class="container">
                <div class="text-end">
                    <a class="btn btn-dark mt-2" href="{{ URL('admin/viewEmployee') }}">VIEW REGISTERED EMPLOYEES</a>
                </div>
            </div>

            <div class="row ">
                <div class="col-sm-5 ms-5">
                    <form method="POST" action="{{ route('storeEmployee') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-container">
                                        <h2 class="text-center mb-4">Employee Information Form</h2>

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Enter Name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Enter Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="maritalstatus">Marital Status</label>
                                            <select name="maritalstatus" class="form-control" id="maritalstatus">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label><br>
                                            <div class="form-check form-check-inline">
                                                <input name="gender" class="form-check-input" type="radio" id="male"
                                                    value="male">
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input name="gender" class="form-check-input" type="radio" id="female"
                                                    value="female">
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="dateofbirth">Date of Birth</label>
                                            <input name="dateofbirth" type="date" class="form-control" id="dateofbirth">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input name="email" type="email" class="form-control" id="email"
                                                placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="mobilenumber">Mobile Number</label>
                                            <input name="mobilenumber" type="text" class="form-control" id="mobilenumber"
                                                placeholder="Enter Mobile Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea name="address" class="form-control" id="address" rows="3" placeholder="Enter Address"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input name="image" type="file" class="form-control" id="image"
                                                rows="3" placeholder="Enter Image">
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select name="type" class="form-control" id="type">
                                                <option value="employee">Employee</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input name="status" type="text" class="form-control" id="status"
                                                rows="3" placeholder="0->user and 1->admin" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="attendance">Attendance</label>
                                            <input name="attendance" type="text" class="form-control" id="attendance"
                                                rows="3" placeholder="Attendance" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input name="salary" type="text" class="form-control" id="salary"
                                                rows="3" placeholder="Salary package" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="position">Position</label>
                                            <input name="position" type="text" class="form-control" id="position"
                                                rows="3" placeholder="position in comapny" value="0">
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
