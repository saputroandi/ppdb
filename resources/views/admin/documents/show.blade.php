@extends('layouts.dashboard')

@section('content')
<div class="form-group row">
    <label for="inputSemester_1" class="col-sm-2 col-form-label">Image Semester 1</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputSemester_1" name="semester_1"
            value="{{$user->document->img_semester_1}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="inputSemester_2" class="col-sm-2 col-form-label">Image Semester 2</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputSemester_2" name="semester_2"
            value="{{$user->document->img_semester_2}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="inputSemester_3" class="col-sm-2 col-form-label">Image Semester 3</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputSemester_3" name="semester_3"
            value="{{$user->document->img_semester_3}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="inputSemester_4" class="col-sm-2 col-form-label">Image Semester 4</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputSemester_4" name="semester_4"
            value="{{$user->document->img_semester_4}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="inputSemester_5" class="col-sm-2 col-form-label">Image Semester 5</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputSemester_5" name="semester_5"
            value="{{$user->document->img_semester_5}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="inputSemester_6" class="col-sm-2 col-form-label">Image Semester 6</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputSemester_6" name="semester_6"
            value="{{$user->document->img_semester_6}}" readonly>
    </div>
</div>
@endsection