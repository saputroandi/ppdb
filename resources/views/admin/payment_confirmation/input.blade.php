@extends('layouts.dashboard')

@section('content')
<form action="/payment/input" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputName" name="name" value="{{Auth::user()->name}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputDate" class="col-sm-2 col-form-label">Pay Date</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="inputDate" name="pay_date">
            <small style="color: red;">@error('pay_date'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputBankName" class="col-sm-2 col-form-label">Bank Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputBankName" name="bank_name">
            <small style="color: red;">@error('bank_name'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputBankAccount" class="col-sm-2 col-form-label">Bank Account</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputBankAccount" name="bank_account">
            <small style="color: red;">@error('bank_account'){{$message}}@enderror</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="customFile" class="col-sm-2 col-form-label">Proof of Payment</label>
        <div class="col-sm-10">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="proof_of_payment">
                <label class="custom-file-label" for="proof_of_payment">Choose file</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputNote" class="col-sm-2 col-form-label">Note</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputNote" name="note">
            <small style="color: red;">@error('note'){{$message}}@enderror</small>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
@endsection