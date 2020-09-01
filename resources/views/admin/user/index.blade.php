@extends('layouts.dashboard')

@section('content')
<div class="row">
    @foreach ($users as $user)
    <div class="card m-2" style="width: 18rem;">
        <img src="data:image/jpg;base64,{{$user->picture}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{$user->name}}</h5>
            <p>Gelombang : {{$user->session_regis}}</p>
            @if ($user->graduation_status)
            <p>Status : {{$user->graduation_status}}</p>
            @else
            <p>Status : Waiting for Next Announcment</p>
            @endif
            <a href="/user/show/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
        </div>
    </div>
    @endforeach
</div>
@endsection