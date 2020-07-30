@extends('layouts.app')

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
                    <a href="/form/{{$student->id}}/edit" class="btn btn-primary">Edit</a>
                @endif
                <form id="logout-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/user/{{$student->id}}" class="btn btn-danger">Delete</a>
                </form>
            </td>
        </tr>
    </tbody>    
    @endforeach
    </table>
@endsection
