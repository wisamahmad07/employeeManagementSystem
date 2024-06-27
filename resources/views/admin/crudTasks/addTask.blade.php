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
    <title>Add Tasks</title>
</head>

<body>
    @extends('admin.layout.layout')
    @section('content')
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 center-screen">
                    <h1 class="text-center">Add Tasks</h1>
                </div>
            </div>

            <nav class="navbar navbar-expand-sm bg-dark">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <p class="nav-link text-light" href="#">ADD TASKS</p>
                        </li>
                </div>
            </nav>
            <div class="container">
                <div class="text-end">
                    <a class="btn btn-dark mt-2" href="{{ URL('admin/viewTask') }}">VIEW TASKS</a>
                </div>
            </div>

            <div class="row ">
                <div class="col-sm-5 ms-5">
                    <form method="POST" action="{{ route('storeTask', ['id' => $data->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-container">
                                        <h2 class="text-center mb-4">TASK Information Form</h2>
                                        <form>
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Enter Name" name="name" value="{{ $data->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control" id="description"
                                                    placeholder="Enter description" name="description"
                                                    value="{{ $data->description }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="date">Submit Date</label>
                                                <input type="date" class="form-control" id="date"
                                                    placeholder="Enter date" name="date" value="{{ $data->date }}">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
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
