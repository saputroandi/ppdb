@extends('layouts.dashboard')

@section('content')
<form action="/payment-details/input" method="post">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="cosType" class="col-sm-2 col-form-label">Cost Type</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="cosType" name="cost_type">
        </div>
    </div>
    <div class="form-group row">
        <label for="session1" class="col-sm-2 col-form-label">Session 1</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="session1" name="session_1">
        </div>
    </div>
    <div class="form-group row">
        <label for="session2" class="col-sm-2 col-form-label">Session 2</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="session2" name="session_2">
        </div>
    </div>
    <div class="form-group row">
        <label for="session3" class="col-sm-2 col-form-label">Session 3</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="session3" name="session_3">
        </div>
    </div>
    <div class="form-group row">
        <label for="note" class="col-sm-2 col-form-label">Note</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="note" name="note">
        </div>
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>
</form>
@endsection