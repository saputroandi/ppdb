@extends('layouts.dashboard')

@section('content')
<form action="/payment/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputName" name="name" value="{{$user->name}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="paydate" class="col-sm-2 col-form-label">Pay Date</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="paydate" name="pay_date"
                value="{{$user->paymentconfirmation->pay_date}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="bankname" class="col-sm-2 col-form-label">Bank Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="bankname" name="bank_name"
                value="{{$user->paymentconfirmation->bank_name}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="bankaccount" class="col-sm-2 col-form-label">Bank Account</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="bankaccount" name="bank_account"
                value="{{$user->paymentconfirmation->bank_account}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="proofpayment" class="col-sm-2 col-form-label">Proof of Payment</label>
        <div class="col-sm-10">
            <div class="col-sm-3">
                <img id="proofpayment" src="data:image/jpg;base64,{{$user->paymentconfirmation->proof_of_payment}}"
                    class="img-thumbnail" style="max-width: 250px;">
            </div>
            <div class="col-sm-12">
                <input type="file" class="custom-file-input" id="customFile" name="proof_of_payment"
                    value="{{$user->paymentconfirmation->proof_of_payment}}">
                <label class="custom-file-label mt-2 pb-2" for="proof_of_payment">Choose file</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="status" name="status"
                value="{{$user->paymentconfirmation->status}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="note" class="col-sm-2 col-form-label">Note</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="note" name="note" value="{{$user->paymentconfirmation->note}}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Save</button>
</form>
<td><a href="/" class="btn btn-secondary">Back</a></td>
@endsection