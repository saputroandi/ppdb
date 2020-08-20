@extends('layouts.dashboard')

@section('content')
<form action="/forms" method="post">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputName" value="{{Auth::user()->name}}" readonly>
        </div>

    </div>
    <div class="form-group row">
        <div class="col-sm-2">Gender</div>
        <div class="col-sm-10">
            <select class="custom-select" name="gender">
                <option selected>Open this select menu</option>
                <option value="man">Man</option>
                <option value="women">Women</option>
            </select>
            <small style="color: red;">@error('gender'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputDate" class="col-sm-2 col-form-label">Date Of Birth</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="inputDate" name="date_of_birth">
            <small style="color: red;">@error('date_of_birth'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputBorn" class="col-sm-2 col-form-label">Born</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputBorn" name="date_of_birth">
            <small style="color: red;">@error('born'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputReligion" class="col-sm-2 col-form-label">Religion</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputReligion" name="religion">
            <small style="color: red;">@error('religion'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputFather" class="col-sm-2 col-form-label">Name Of Father</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="InputFather" name="name_of_father">
            <small style="color: red;">@error('name_of_father'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputMother" class="col-sm-2 col-form-label">Name Of Mother</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="InputMother" name="name_of_mother">
            <small style="color: red;">@error('name_of_mother'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputPhone1" class="col-sm-2 col-form-label">Phone Number 1</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="InputPhone1" name="phone_number_1">
            <small style="color: red;">@error('phone_number_1'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputPhone2" class="col-sm-2 col-form-label">Phone Number 2</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="InputPhone2" name="phone_number_2">
            <small style="color: red;">@error('phone_number_2'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputProvince" class="col-sm-2 col-form-label">Province</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="InputProvince" name="province">
            <small style="color: red;">@error('province'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputDistric" class="col-sm-2 col-form-label">Distric</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="InputDistric" name="district">
            <small style="color: red;">@error('district'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputSubDistric" class="col-sm-2 col-form-label">Sub Distric</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="InputSubDistric" name="sub_district">
            <small style="color: red;">@error('sub_district'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputUrbanV" class="col-sm-2 col-form-label">Urban/Village</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="InputUrbanV" name="urban_village">
            <small style="color: red;">@error('urban_village'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputAddress" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="InputAddress" name="address">
            <small style="color: red;">@error('address'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputZip" class="col-sm-2 col-form-label">Zip Code</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="InputZip" name="zip_code">
            <small style="color: red;">@error('zip_code'){{$message}}@enderror</small>
        </div>
    </div>

    <div class="form-group row">
        <label for="InputJHS" class="col-sm-2 col-form-label">Junior High School</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="InputJHS" name="from_jhs">
            <small style="color: red;">@error('from_jhs'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputNISN" class="col-sm-2 col-form-label">NISN</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="InputNISN" name="nisn">
            <small style="color: red;">@error('nisn'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputKK" class="col-sm-2 col-form-label">No KK</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="InputKK" name="no_kk">
            <small style="color: red;">@error('no_kk'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputNIKStudent" class="col-sm-2 col-form-label">NIK Of Student</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="InputNIKStudent" name="nik_of_student">
            <small style="color: red;">@error('nik_of_student'){{$message}}@enderror</small>
        </div>
    </div>

    <div class="form-group row">
        <label for="InputNIKFather" class="col-sm-2 col-form-label">NIK Of Father</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="InputNIKFather" name="nik_of_father">
            <small style="color: red;">@error('nik_of_father'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputNIKMother" class="col-sm-2 col-form-label">NIK Of Mother</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="InputNIKMother" name="nik_of_mother">
            <small style="color: red;">@error('nik_of_mother'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputFatherOccupation" class="col-sm-2 col-form-label">Father Occupation</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="InputFatherOccupation" name="father_occupation">
            <small style="color: red;">@error('father_occupation'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputMotherOccupation" class="col-sm-2 col-form-label">Mother Occupation</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="InputMotherOccupation" name="mother_occupation">
            <small style="color: red;">@error('mother_occupation'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="InputInterest" class="col-sm-2 col-form-label">Major Interest</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="InputInterest" name="majors_interest">
            <small style="color: red;">@error('majors_interest'){{$message}}@enderror</small>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
@endsection