<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF File View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="text-end">
            <a class="btn btn-dark mt-2" href="{{ url('admin/viewSubmittedTask') }}">GO TO Task</a>
        </div>
    </div>
    <h3>
        <p>File Name:{{ substr($file->file, 14) }}</p>
        <p>Uploaded On: {{ $file->created_at }}</p>
    </h3>
    @if (pathinfo($file->file, PATHINFO_EXTENSION) === 'pdf')
        <!-- Display PDF file -->
        <iframe src="{{ asset('submittedFile/' . $file->file) }}" width="90%" height="600px"></iframe>
    @else
        <!-- Show a message for other file types -->
        <p>This file is not a PDF. Please upload a PDF file.</p>
    @endif


</body>

</html>
