@extends('layouts.dashboard')

@section('content')
<form action="/document/input" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="inputSemester_1" class="col-sm-2 col-form-label">Image Semester 1</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="inputSemester_1" name="img_semester_1">
            <small style="color: red;">@error('img_semester_1'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSemester_2" class="col-sm-2 col-form-label">Image Semester 2</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="inputSemester_2" name="img_semester_2">
            <small style="color: red;">@error('img_semester_2'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSemester_3" class="col-sm-2 col-form-label">Image Semester 3</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="inputSemester_3" name="img_semester_3">
            <small style="color: red;">@error('img_semester_3'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSemester_4" class="col-sm-2 col-form-label">Image Semester 4</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="inputSemester_4" name="img_semester_4">
            <small style="color: red;">@error('img_semester_4'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSemester_5" class="col-sm-2 col-form-label">Image Semester 5</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="inputSemester_5" name="img_semester_5">
            <small style="color: red;">@error('img_semester_5'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSemester_6" class="col-sm-2 col-form-label">Image Semester 6</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="inputSemester_6" name="img_semester_6">
            <small style="color: red;">@error('img_semester_6'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSKHUN" class="col-sm-2 col-form-label">Image SKHUN</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="inputSKHUN" name="img_skhun">
            <small style="color: red;">@error('img_skhun'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputAkta" class="col-sm-2 col-form-label">Image Akta</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="inputAkta" name="img_akta">
            <small style="color: red;">@error('img_akta'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputKK" class="col-sm-2 col-form-label">Image KK</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="inputKK" name="img_kk">
            <small style="color: red;">@error('img_kk'){{$message}}@enderror</small>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
@endsection