@extends('layouts.dashboard')

@section('content')
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName" name="name" value="{{$user->name}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="paydate" class="col-sm-2 col-form-label">Pay Date</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="paydate" name="pay_date"
            value="{{$user->paymentconfirmation->pay_date}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="bankname" class="col-sm-2 col-form-label">Bank Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="bankname" name="bank_name"
            value="{{$user->paymentconfirmation->bank_name}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="bankaccount" class="col-sm-2 col-form-label">Bank Account</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="bankaccount" name="bank_account"
            value="{{$user->paymentconfirmation->bank_account}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="proofpayment" class="col-sm-2 col-form-label">Bank Account</label>
    <div class="col-sm-10">
        <img id="proofpayment" src="data:image/jpg;base64,{{$user->paymentconfirmation->proof_of_payment}}"
            class="img-thumbnail" style="max-width: 250px;">
    </div>
</div>
<div class="form-group row">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="status" name="status" value="{{$user->paymentconfirmation->status}}"
            readonly>
    </div>
</div>
<div class="form-group row">
    <label for="note" class="col-sm-2 col-form-label">Note</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="note" name="note" value="{{$user->paymentconfirmation->note}}"
            readonly>
    </div>
</div>
@if(Auth::user()->role_id == '1')
<td><a href="/" class="btn btn-secondary">Back</a></td>
@endif
<td><a href="/payment/show/{{$user->id}}/edit" class="btn btn-primary">Edit</a></td>
@endsection