@extends('layouts.dashboard')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Semester 1</th>
            <th scope="col">Semester 2</th>
            <th scope="col">Semester 3</th>
            <th scope="col">Semester 4</th>
            <th scope="col">Semester 5</th>
            <th scope="col">Semester 6</th>
            <th scope="col">Average</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    @foreach ($users as $user)
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>{{$user->name}}</td>
            @if(isset($user->grade)==true)
            <td>{{$user->grade->semester_1}}</td>
            <td>{{$user->grade->semester_2}}</td>
            <td>{{$user->grade->semester_3}}</td>
            <td>{{$user->grade->semester_4}}</td>
            <td>{{$user->grade->semester_5}}</td>
            <td>{{$user->grade->semester_6}}</td>
            <td>{{$user->grade->average}}</td>
            @else
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            @endif
            <td class="d-flex">
                @if(isset($user->grade->semester_1)==true)
                <a href="/grade/show/{{$user->id}}" class="btn btn-primary">Details</a>
                <a href="/grade/show/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
                @endif
                <form action="/grade/delete/{{$user->id}}" method="POST">
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