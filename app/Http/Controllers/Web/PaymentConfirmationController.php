<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentConfirmation;
use App\User;

class PaymentConfirmationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAllPaymentConfirmation()
    {
        if(auth()->user()->role_id == 1){
            $users = User::all();
            return view('admin.payment_confirmation.index',['users'=>$users]);
        }else{
            return redirect('/payment/show/'.auth()->user()->id);
        }
    }

    public function showPaymentConfirmation($id)
    {
        $user = User::find($id);
        if(auth()->user()->role_id == 2){
            if(auth()->user()->id==$id){
                return view('admin.payment_confirmation.show',['user'=>$user]);
            }else{
                return redirect('/')->with('error','No authorization');
            }
        }else{
                return view('admin.payment_confirmation.show',['user'=>$user]);
        }
    }

    public function inputPaymentConfirmation()
    {
        $checkPayment=PaymentConfirmation::where('user_id',auth()->user()->id)->first();
        if($checkPayment == null){
            return view('admin.payment_confirmation.input');
        }else{
            return redirect('/payment/show/'.auth()->user()->id)->with('success','You have inputed document yet');
        }
    }

    public function storePaymentConfirmation(Request $request)
    {
        $this->validate($request,[
            'pay_date'         => 'required',
            'bank_name'        => 'required|string',
            'bank_account'     => 'required|string',
            'proof_of_payment' => 'required|image|max:1999',
            'note'             => 'nullable|string',
        ]);

        $payment                   = new PaymentConfirmation;
        $payment->user_id          = auth()->user()->id;
        $payment->pay_date         = $request->pay_date;
        $payment->bank_name        = $request->bank_name;
        $payment->bank_account     = $request->bank_account;
        $payment->proof_of_payment = base64_encode(file_get_contents($request->file('proof_of_payment')));
        $payment->status           = 'waiting for admin verification';
        $payment->note             = $request->note;
        $payment->save();
        return redirect('/payment/show')->with('success','Your payment has been added');
    }

    public function editPaymentConfirmation($id)
    {
        $user = User::find($id);
        if(auth()->user()->role_id == 2){
            if(auth()->user()->id==$id){
                return view('admin.payment_confirmation.edit',['user'=>$user]);
            }else{
                return redirect('/')->with('error','No authorization');
            }
        }else{
                return view('admin.payment_confirmation.edit',['user'=>$user]);
        }
    }

    public function updatePaymentConfirmation(Request $request,$id)
    {
        $this->validate($request,[
            'pay_date'     => 'required|string',
            'bank_name'    => 'required|string',
            'bank_account' => 'required|string',
            'note'         => 'nullable',
        ]);

        isset($request->proof_of_payment)==true?$this->validate($request,['proof_of_payment' => 'image|max:1999',]):null;


        $payment                   = PaymentConfirmation::where('user_id',$id)->first();
        $payment->pay_date         = $request->pay_date;
        $payment->bank_name        = $request->bank_name;
        $payment->bank_account     = $request->bank_account;
        $payment->proof_of_payment = isset($request->proof_of_payment) == true?base64_encode(file_get_contents($request->file('proof_of_payment'))):$payment->proof_of_payment;
        $payment->note             = $request->note;
        $payment->save();

        return redirect('/payment/show')->with('success','Your payment has been updated');
    }

    public function deletePaymentConfirmation($id)
    {
        if(auth()->user()->role_id == 1){
            $payment=PaymentConfirmation::find($id);
            $payment->delete();
            return redirect('/payment/show')->with('success','Payment confirmation has been deleted');
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }

    // public function verificationPaymentConfirmation()
    // {
    //     $payment=PaymentConfirmation::where('status','waiting for admin verification')->get();
    //     dd($payment);
    // }
}
