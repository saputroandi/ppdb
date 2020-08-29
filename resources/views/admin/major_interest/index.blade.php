@extends('layouts.dashboard')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    @foreach ($interests as $interest)
    <tbody>
        <tr>
            <td scope="row">1</td>
            <td>{{$interest->name}}</td>
            <td class="d-flex">
                <a href="/interest/show/{{$interest->id}}/edit" class="btn btn-primary">Edit</a>
                <form action="/interest/delete/{{$interest->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure want to delete {{$interest->name}} ?')">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection