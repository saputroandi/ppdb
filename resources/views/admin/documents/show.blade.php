@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="card m-1" style="width: 18rem;">
        <img src="data:image/jpeg;base64,{{$user->document->img_semester_1}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Image Semester 1</h5>
        </div>
    </div>
    <div class="card m-1" style="width: 18rem;">
        <img src="data:image/jpg;base64,{{$user->document->img_semester_2}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Image Semester 2</h5>
        </div>
    </div>
    <div class="card m-1" style="width: 18rem;">
        <img src="data:image/jpg;base64,{{$user->document->img_semester_3}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Image Semester 3</h5>
        </div>
    </div>
    <div class="card m-1" style="width: 18rem;">
        <img src="data:image/jpg;base64,{{$user->document->img_semester_4}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Image Semester 4</h5>
        </div>
    </div>
    <div class="card m-1" style="width: 18rem;">
        <img src="data:image/jpg;base64,{{$user->document->img_semester_5}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Image Semester 5</h5>
        </div>
    </div>
    <div class="card m-1" style="width: 18rem;">
        <img src="data:image/jpg;base64,{{$user->document->img_semester_6}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Image Semester 6</h5>
        </div>
    </div>
    <div class="card m-1" style="width: 18rem;">
        <img src="data:image/jpg;base64,{{$user->document->img_skhun}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Image SKHUN</h5>
        </div>
    </div>
    <div class="card m-1" style="width: 18rem;">
        <img src="data:image/jpg;base64,{{$user->document->img_akta}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Image Akta</h5>
        </div>
    </div>
    <div class="card m-1" style="width: 18rem;">
        <img src="data:image/jpg;base64,{{$user->document->img_kk}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Image KK</h5>
        </div>
    </div>
</div>
@if(Auth::user()->role_id == '1')
<td><a href="/document/show" class="btn btn-secondary">Back</a></td>
@endif
<td><a href="/document/show/{{$user->document->user_id}}/edit" class="btn btn-primary">Edit</a></td>
@endsection