@extends('layouts.dashboard')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    @foreach ($students as $student)
    <tbody>
        <tr>
            <th scope="row">1</th>
            @if(isset($student->form->name)==true)
            <td>{{$student->form->name}}</td>
            @else
            <td>{{$student->name}}</td>
            @endif
            <td>{{$student->email}}</td>
            <td class="d-flex">
                @if(isset($student->form->name)==true)
                <a href="/forms/{{$student->form->id}}" class="btn btn-primary">Details</a>
                <a href="/forms/{{$student->id}}/edit" class="btn btn-primary">Edit</a>
                @endif
                <form action="/forms/{{$student->id}}" method="POST">
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