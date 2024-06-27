@extends('admin.layout.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Admin setting</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Update Admin Details</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
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
                            <form method="post" action="{{ url('admin/updateDetails') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="adminEmail">Email address</label>
                                        <input class="form-control bg-secondary" id="adminEmail"
                                            value="{{ Auth::guard('admin')->user()->email }}" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label for="adminName">Admin Name</label>
                                        <input type="text" name="adminName" class="form-control" id="adminName"
                                            placeholder="admin name" value="{{ Auth::guard('admin')->user()->name }}">
                                        {{-- <span id="verifyCurrentPassword"></span> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="adminMobile">Mobile</label>
                                        <input type="text" name="adminMobile" class="form-control" id="adminMobile"
                                            placeholder="admin mobile"
                                            value="{{ Auth::guard('admin')->user()->mobilenumber }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="maritalstatus">Marital status</label>
                                        <div>
                                            <label for="maritalstatus_yes">
                                                <input type="radio" name="maritalstatus" id="maritalstatus_yes"
                                                    value="yes"
                                                    {{ Auth::guard('admin')->user()->maritalstatus == 'yes' ? 'checked' : '' }}>
                                                Yes
                                            </label>
                                            &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                            <label for="maritalstatus_no">
                                                <input type="radio" name="maritalstatus" id="maritalstatus_no"
                                                    value="no"
                                                    {{ Auth::guard('admin')->user()->maritalstatus == 'no' ? 'checked' : '' }}>
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="gender" class="form-control" id="gender">
                                            <option value="male"
                                                {{ Auth::guard('admin')->user()->gender == 'male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="female"
                                                {{ Auth::guard('admin')->user()->gender == 'female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="dateofbirth">Date of Birth</label>
                                        <input type="text" name="dateofbirth" class="form-control" id="dateofbirth"
                                            placeholder="date/month/year"
                                            value="{{ Auth::guard('admin')->user()->dateofbirth }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address"
                                            placeholder="address" value="{{ Auth::guard('admin')->user()->address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="adminImage">Image</label>
                                        <input type="file" name="adminImage" class="form-control" id="adminImage"
                                            value="{{ url('admin/images/photos/' . Auth::guard('admin')->user()->image) }}" />
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



    <!-- /.card -->
@endsection
