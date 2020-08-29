@extends('layouts.dashboard')

@section('content')
<form action="/interest/input" method="post">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Name of Major Interest</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputName" name="name">
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
@endsection