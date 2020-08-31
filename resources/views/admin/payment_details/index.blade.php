@extends('layouts.dashboard')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cost Type</th>
            <th scope="col">Session 1</th>
            <th scope="col">Session 2</th>
            <th scope="col">Session 3</th>
            <th scope="col">Note</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    @foreach ($details as $detail)
    <tbody>
        <tr>
            <td scope="row">1</td>
            <td>{{$detail->cost_type}}</td>
            <td>{{$detail->session_1}}</td>
            <td>{{$detail->session_2}}</td>
            <td>{{$detail->session_3}}</td>
            <td>{{$detail->note}}</td>
            <td class="d-flex">
                <a href="/payment-details/show/{{$detail->id}}/edit" class="btn btn-primary">Edit</a>
                <form action="/payment-details/delete/{{$detail->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure want to delete this payment details ?')">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection