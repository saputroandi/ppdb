@extends('layouts.dashboard')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">{{$form->name}}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Photo</td>
            <td>{{$form->photo}}</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>{{$form->gender}}</td>
        </tr>
        <tr>
            <td>Date Of Birth</td>
            <td>{{$form->date_of_birth}}</td>
        </tr>
        <tr>
            <td>Born</td>
            <td>{{$form->born}}</td>
        </tr>
        <tr>
            <td>Religion</td>
            <td>{{$form->religion}}</td>
        </tr>
        <tr>
            <td>Name Of Father</td>
            <td>{{$form->name_of_father}}</td>
        </tr>
        <tr>
            <td>Name Of Mother</td>
            <td>{{$form->name_of_mother}}</td>
        </tr>
        <tr>
            <td>Phone Number 1</td>
            <td>{{$form->phone_number_1}}</td>
        </tr>
        <tr>
            <td>Phone Number 2</td>
            <td>{{$form->phone_number_2}}</td>
        </tr>
        <tr>
            <td>District</td>
            <td>{{$form->district}}</td>
        </tr>
        <tr>
            <td>Sub District</td>
            <td>{{$form->sub_district}}</td>
        </tr>
        <tr>
            <td>Urban Village</td>
            <td>{{$form->urban_village}}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>{{$form->address}}</td>
        </tr>
        <tr>
            <td>Zip Code</td>
            <td>{{$form->zip_code}}</td>
        </tr>
        <tr>
            <td>Junior High School</td>
            <td>{{$form->from_jhs}}</td>
        </tr>
        <tr>
            <td>NISN</td>
            <td>{{$form->nisn}}</td>
        </tr>
        <tr>
            <td>No KK</td>
            <td>{{$form->no_kk}}</td>
        </tr>
        <tr>
            <td>NIK Of Student</td>
            <td>{{$form->nik_of_student}}</td>
        </tr>
        <tr>
            <td>NIK Of Father</td>
            <td>{{$form->nik_of_father}}</td>
        </tr>
        <tr>
            <td>NIK Of Mother</td>
            <td>{{$form->nik_of_mother}}</td>
        </tr>
        <tr>
            <td>Father Occupation</td>
            <td>{{$form->father_occupation}}</td>
        </tr>
        <tr>
            <td>Mother Occupation</td>
            <td>{{$form->mother_occupation}}</td>
        </tr>
        <tr>
            <td>Majors Interest</td>
            <td>{{$form->majors_interest}}</td>
        </tr>
        <tr>
            <td><a href="/forms" class="btn btn-secondary">Back</a></td>
            <td><a href="/forms/{{$form->user->id}}/edit" class="btn btn-primary">Edit</a></td>
        </tr>
    </tbody>
</table>
@endsection