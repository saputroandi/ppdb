@extends('layouts.dashboard')

@section('content')
<form action="/grade/input" method="post">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="inputSemester_1" class="col-sm-2 col-form-label">Semester 1</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputSemester_1" name="semester_1">
            <small style="color: red;">@error('semester_1'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSemester_2" class="col-sm-2 col-form-label">Semester 2</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputSemester_2" name="semester_2">
            <small style="color: red;">@error('semester_2'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSemester_3" class="col-sm-2 col-form-label">Semester 3</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputSemester_3" name="semester_3">
            <small style="color: red;">@error('semester_3'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSemester_4" class="col-sm-2 col-form-label">Semester 4</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputSemester_4" name="semester_4">
            <small style="color: red;">@error('semester_4'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSemester_5" class="col-sm-2 col-form-label">Semester 5</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputSemester_5" name="semester_5">
            <small style="color: red;">@error('semester_5'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSemester_6" class="col-sm-2 col-form-label">Semester 6</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputSemester_6" name="semester_6">
            <small style="color: red;">@error('semester_6'){{$message}}@enderror</small>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
@endsection