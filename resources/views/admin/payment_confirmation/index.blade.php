@extends('layouts.dashboard')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Pay Date</th>
            <th scope="col">Bank Name</th>
            <th scope="col">Bank Account</th>
            <th scope="col">Proof of Payment</th>
            <th scope="col">Status</th>
            <th scope="col">Note</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    @foreach ($users as $user)
    <tbody>
        <tr>
            <td scope="row">1</td>
            <td>{{$user->name}}</td>
            @if(isset($user->paymentconfirmation)==true)
            <td>{{$user->paymentconfirmation->pay_date}}</td>
            <td>{{$user->paymentconfirmation->bank_name}}</td>
            <td>{{$user->paymentconfirmation->bank_account}}</td>
            <td><img style="width: 10rem;" src="data:image/jpg;base64,{{$user->paymentconfirmation->proof_of_payment}}"
                    class="img-thumbnail"></td>
            <td>{{$user->paymentconfirmation->status}}</td>
            <td>{{$user->paymentconfirmation->note}}</td>
            @else
            <td>Not Confirmation Yet</td>
            <td>Not Confirmation Yet</td>
            <td>Not Confirmation Yet</td>
            <td>Not Confirmation Yet</td>
            <td>Not Confirmation Yet</td>
            <td>Not Confirmation Yet</td>
            @endif
            <td class="d-flex">
                <a href="/payment/show/{{$user->id}}" class="btn btn-primary">Details</a>
                <a href="/payment/show/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
                <form action="/payment/delete/{{$user->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure want to delete this news ?')">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection