@extends('layouts.dashboard')

@section('content')
<form action="/interest/update/{{$interest->id}}" method="post">
    {{ csrf_field() }}
    @method('PATCH')
    <div class="form-group row">
        <label for="name_interest" class="col-sm-2 col-form-label">Name of Major Interest</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name_interest" name="name" value="{{$interest->name}}">
            <small style="color: red;">@error('name_interest'){{$message}}@enderror</small>
        </div>
    </div>
    <button class="btn btn-primary mt-3" type="submit">Submit</button>
</form>
<a href="/interest/show" class="btn btn-secondary mt-3">Back</a>
@endsection