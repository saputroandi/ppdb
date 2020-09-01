@extends('layouts.dashboard')

@section('content')
<form action="/user/update/{{$user->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="staticEmail" value="{{$user->email}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name">
        </div>
    </div>
    <div class="form-group row">
        <label for="password_1" class="col-sm-3 col-form-label">New Password</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="password_1" name="password">
        </div>
    </div>
    <div class="form-group row">
        <label for="password_2" class="col-sm-3 col-form-label">Confirm New Password</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="password_2" name="password_confirmation">
        </div>
    </div>
    <div class="form-group row">
        <label for="picture" class="col-sm-3 col-form-label">Picture</label>
        <div class="col-sm-3">
            <img src="data:image/jpg;base64,{{$user->picture}}" class="img-thumbnail" style="max-width: 250px;">
        </div>
        <div class="col-sm-6">
            <input type="file" class="form-control" id="picture" name="picture">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
<a href="/user/show/{{$user->id}}" class="btn btn-secondary mt-3">Back</a>
@endsection