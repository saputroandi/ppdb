@extends('layouts.dashboard')

@section('content')
<form action="/document/update/{{$user->id}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PATCH')
    <div class="row">
        <div class="card m-1" style="width: 18rem;">
            <img src="data:image/jpeg;base64,{{$user->document->img_semester_1}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Image Semester 1</h5>
                <input type="file" class="form-control" id="inputSemester_1" name="img_semester_1">
                <small style=" color: red;">@error('img_semester_1'){{$message}}@enderror</small>
            </div>
        </div>
        <div class="card m-1" style="width: 18rem;">
            <img src="data:image/jpeg;base64,{{$user->document->img_semester_2}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Image Semester 2</h5>
                <input type="file" class="form-control" id="inputSemester_2" name="img_semester_2">
                <small style=" color: red;">@error('img_semester_2'){{$message}}@enderror</small>
            </div>
        </div>
        <div class="card m-1" style="width: 18rem;">
            <img src="data:image/jpeg;base64,{{$user->document->img_semester_3}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Image Semester 3</h5>
                <input type="file" class="form-control" id="inputSemester_3" name="img_semester_3">
                <small style=" color: red;">@error('img_semester_3'){{$message}}@enderror</small>
            </div>
        </div>
        <div class="card m-1" style="width: 18rem;">
            <img src="data:image/jpeg;base64,{{$user->document->img_semester_4}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Image Semester 4</h5>
                <input type="file" class="form-control" id="inputSemester_4" name="img_semester_4">
                <small style=" color: red;">@error('img_semester_4'){{$message}}@enderror</small>
            </div>
        </div>
        <div class="card m-1" style="width: 18rem;">
            <img src="data:image/jpeg;base64,{{$user->document->img_semester_5}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Image Semester 5</h5>
                <input type="file" class="form-control" id="inputSemester_5" name="img_semester_5">
                <small style=" color: red;">@error('img_semester_5'){{$message}}@enderror</small>
            </div>
        </div>
        <div class="card m-1" style="width: 18rem;">
            <img src="data:image/jpeg;base64,{{$user->document->img_semester_6}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Image Semester 6</h5>
                <input type="file" class="form-control" id="inputSemester_6" name="img_semester_6">
                <small style=" color: red;">@error('img_semester_6'){{$message}}@enderror</small>
            </div>
        </div>
        <div class="card m-1" style="width: 18rem;">
            <img src="data:image/jpeg;base64,{{$user->document->img_skhun}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Image SKHUN</h5>
                <input type="file" class="form-control" id="inputSKHUN" name="img_skhun">
                <small style=" color: red;">@error('img_skhun'){{$message}}@enderror</small>
            </div>
        </div>
        <div class="card m-1" style="width: 18rem;">
            <img src="data:image/jpeg;base64,{{$user->document->img_akta}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Image AKTA</h5>
                <input type="file" class="form-control" id="inputAkta" name="img_akta">
                <small style=" color: red;">@error('img_akta'){{$message}}@enderror</small>
            </div>
        </div>
        <div class="card m-1" style="width: 18rem;">
            <img src="data:image/jpeg;base64,{{$user->document->img_kk}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Image KK</h5>
                <input type="file" class="form-control" id="inputKK" name="img_kk">
                <small style=" color: red;">@error('img_kk'){{$message}}@enderror</small>
            </div>
        </div>
    </div>
    <button class="btn btn-primary mt-3" type="submit">Submit</button>
</form>
<a href="/document/show" class="btn btn-secondary mt-3">Back</a>
@endsection