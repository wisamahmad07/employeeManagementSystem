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
                    <h1 class="text-center">EDIT REGISTERED EMPLOYEES</h1>
                </div>
            </div>

            <nav class="navbar navbar-expand-sm bg-dark">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <p class="nav-link text-light" href="#">EDIT EMPLOYEES</p>
                        </li>
                </div>
            </nav>
            <div class="container">
                <div class="text-end">
                    <a class="btn btn-dark mt-2" href="{{ URL('admin/viewEmployee') }}">VIEW REGISTERED EMPLOYEES</a>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Update Admin Details</h3>
                                </div>
                                <!-- /.card-header -->

                                @if (Session::has('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success</strong> {{ Session::get('success_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times; </span>
                                        </button>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- form start -->
                                <form method="post" action="updateEmployee" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input class="form-control bg-secondary" name="email" id="email"
                                                value="{{ $data->email }}" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Admin Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="employee name" value="{{ $data->name }}">
                                            {{-- <span id="verifyCurrentPassword"></span> --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="text" name="mobilenumber" class="form-control" id="mobile"
                                                placeholder="employee mobile" value="{{ $data->mobilenumber }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="maritalstatus">Marital status</label>
                                            <div>
                                                <label for="maritalstatus_yes">
                                                    <input type="radio" name="maritalstatus" id="maritalstatus_yes"
                                                        value="yes" {{ $data->maritalstatus == 'yes' ? 'checked' : '' }}>
                                                    Yes
                                                </label>
                                                &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                                <label for="maritalstatus_no">
                                                    <input type="radio" name="maritalstatus" id="maritalstatus_no"
                                                        value="no" {{ $data->maritalstatus == 'no' ? 'checked' : '' }}>
                                                    No
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select name="gender" class="form-control" id="gender">
                                                <option value="male" {{ $data->gender == 'male' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="female" {{ $data->gender == 'female' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="dateofbirth">Date of Birth</label>
                                            <input type="text" name="dateofbirth" class="form-control" id="dateofbirth"
                                                placeholder="date/month/year" value="{{ $data->dateofbirth }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                placeholder="address" value="{{ $data->address }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select name="type" class="form-control" id="type">
                                                <option value="{{ $data->address }}">Employee</option>
                                                <option value="{{ $data->address }}">Admin</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input name="status" type="text" class="form-control" id="status"
                                                rows="3" placeholder="0->user and 1->admin"
                                                value="{{ $data->status }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input name="salary" type="text" class="form-control" id="salary"
                                                rows="3" placeholder="Enter salary package"
                                                value="{{ $data->salary }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="position">Position</label>
                                            <input name="position" type="text" class="form-control" id="position"
                                                rows="3" placeholder="enter position in company"
                                                value="{{ $data->position }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="attendance">Attendance</label>
                                            <input name="attendance" type="text" class="form-control" id="attendance"
                                                rows="3" placeholder="mark Employee attendance"
                                                value="{{ $data->attendance }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="adminImage">Image</label>
                                            <input type="file" name="adminImage" class="form-control" id="adminImage"
                                                value="{{ url('admin/images/photos/' . $data->image) }}" />
                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection

</body>

</html>
