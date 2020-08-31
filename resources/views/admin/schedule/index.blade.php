@extends('layouts.dashboard')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Schedule Title</th>
            <th scope="col">Schedule Date</th>
            <th scope="col">Schedule Time</th>
            <th scope="col">Schedule Content</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    @foreach ($schedules as $schedule)
    <tbody>
        <tr>
            <td scope="row">1</td>
            <td>{{$schedule->schedule_title}}</td>
            <td>{{$schedule->schedule_date}}</td>
            <td>{{$schedule->schedule_time}}</td>
            <td>{{$schedule->schedule_content}}</td>
            <td class="d-flex">
                <a href="/schedule/show/{{$schedule->id}}/edit" class="btn btn-primary">Edit</a>
                <form action="/schedule/delete/{{$schedule->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure want to delete this schedule ?')">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection