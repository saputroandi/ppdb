@extends('layouts.dashboard')

@section('content')
<form action="/news/input" method="post">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">News Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputName" name="title">
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">News Content</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
@endsection