@extends('layouts.dashboard')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Document status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    @foreach ($users as $user)
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>{{$user->name}}</td>
            @if(isset($user->document)==true)
            <td>Document uploaded</td>
            @else
            <td>Document empty</td>
            @endif
            <td class="d-flex">
                @if(isset($user->document->img_semester_1)==true)
                <a href="/document/show/{{$user->id}}" class="btn btn-primary">Details</a>
                <a href="/document/show/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
                @endif
                <form action="/document/delete/{{$user->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection