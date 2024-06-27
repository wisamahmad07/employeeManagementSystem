@extends('admin.layout.layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 center-screen">
                <h1 class="text-center">EDIT EMPLOYEES DETAILS</h1>
            </div>
        </div>

        <nav class="navbar navbar-expand-sm bg-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <p class="nav-link text-light" href="#">EDIT EMPLOYEES DETAILS</p>
                    </li>
            </div>
        </nav>
        <div class="container">
            <div class="text-end">
                <a class="btn btn-dark mt-2" href="{{ URL('admin/viewEmployeeCompanyDetail') }}">VIEW EMPLOYEES DETAILS</a>
            </div>
        </div>

        <div class="row ">
            <div class="col-sm-5 ms-5">
                <form method="post" action="updateEmployeeCompanyDetail">
                    @csrf
                    @method('PUT')
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-container">
                                    <h2 class="text-center mb-4">EDIT EMPLOYEE INFORMATION</h2>


                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                            name="name" value="{{ $employeeData->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Position</label>
                                        <input type="text" class="form-control" id="position"
                                            placeholder="Enter position" name="position"
                                            value="{{ $employeeCompanyData->position }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Salary</label>
                                        <input type="text" class="form-control" id="salary" placeholder="Enter salary"
                                            name="salary" value="{{ $employeeCompanyData->salary }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="attendance">Attendance</label>
                                        <input type="text" class="form-control" id="attendance"
                                            placeholder="Enter attendance" name="attendance"
                                            value="{{ $employeeCompanyData->attendance }}">
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
@endsection
