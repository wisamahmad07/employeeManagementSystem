@extends('admin.layout.layout')
@section('content')
    <div class="content-wrapper">
        <h1 class="text-center text-cyan">VIEW TASKS</h1>
        <nav class="navbar navbar-expand-sm bg-dark">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link text-light" href="#">FOR TASK DETAILS VIEW</a>
                </li>
            </ul>
        </nav>

        <table id="example" class="display nowrap" style="width:100%">
            <thead style="background-color:#0080ff; color:white;">
                <tr>
                    <th>Task Number</th>
                    <th>Task NAME</th>
                    <th>Task Description</th>
                    <th>Task Submission Date</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taskData as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->date }}</td>
                        <td>
                            @if (!empty($data->file))
                                <form method="POST" class="d-inline" action="task/{{ $data->id }}/deleteTask">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                                </form>
                                Task submitted succesfully
                            @else
                                <a class="btn btn-success btn-sm" href="task/{{ $data->id }}/addTask">
                                    TASK</a>
                                <form method="POST" class="d-inline" action="task/{{ $data->id }}/deleteTask">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
