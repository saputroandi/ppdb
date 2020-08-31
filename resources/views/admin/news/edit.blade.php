@extends('layouts.dashboard')

@section('content')
<form action="/news/update/{{$news->id}}" method="post">
    {{ csrf_field() }}
    @method('PATCH')
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">News Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="{{$news->post_title}}">
            <small style="color: red;">@error('title'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">News Content</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                name="content">{{$news->post_content}}</textarea>
        </div>
    </div>
    <button class="btn btn-primary mt-3" type="submit">Submit</button>
</form>
<a href="/interest/show" class="btn btn-secondary mt-3">Back</a>
@endsection