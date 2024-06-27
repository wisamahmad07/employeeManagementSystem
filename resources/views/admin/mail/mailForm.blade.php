<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Mail to Employees</title>
</head>

<body>
    @extends('admin.layout.layout')

    @section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container d-flex justify-content-center " style="height: 100vh;">
                <div class="form-group">
                    <br><br>
                    <h3 class="text-uppercase">Send mail TO all email employees</h3><br>
                    <form action="{{ route('sendMail') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="subject">Subject of mail</label>
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="subject">
                        </div>
                        <div class="form-group">
                            <label for="details">Details of mail</label>
                            <textarea name="details" class="form-control" id="details" cols="30" rows="5"></textarea>
                        </div>
                        <input class="submit btn btn-success" type="submit" name="SubmitButton" id="">
                    </form>
                </div>
            </div>

        </div>
    @endsection
</body>

</html>
