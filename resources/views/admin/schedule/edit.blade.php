@extends('layouts.dashboard')

@section('content')
<form action="/schedule/update/{{$schedule->id}}" method="post">
    {{ csrf_field() }}
    @method('PATCH')
    <div class="form-group row">
        <label for="inputSchedule" class="col-sm-2 col-form-label">Schedule Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputSchedule" name="schedule_title"
                value="{{$schedule->schedule_title}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputScheduleDate" class="col-sm-2 col-form-label">Schedule Date</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="inputScheduleDate" name="schedule_date"
                value="{{$schedule->schedule_date}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputScheduleTime" class="col-sm-2 col-form-label">Schedule Time</label>
        <div class="col-sm-10">
            <input type="time" class="form-control" id="inputScheduleTime" name="schedule_time"
                value="{{$schedule->schedule_time}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Schedule Content</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                name="schedule_content">{{$schedule->schedule_content}}</textarea>
        </div>
    </div>
    <button class="btn btn-primary mt-3" type="submit">Submit</button>
</form>
<a href="/interest/show" class="btn btn-secondary mt-3">Back</a>
@endsection