@extends('layouts.dashboard')

@section('content')
<div class="form-group row">
    <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="staticEmail" value="{{$user->email}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-sm-3 col-form-label">Name</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="picture" class="col-sm-3 col-form-label">Picture</label>
    <div class="col-sm-9">
        <img src="data:image/jpg;base64,{{$user->picture}}" class="img-thumbnail" style="max-width: 250px;">
    </div>
</div>
<a href="/user/show/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
<a href="/" class="btn btn-secondary">Back</a>
@endsection