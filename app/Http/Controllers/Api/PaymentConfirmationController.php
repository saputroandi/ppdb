<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentConfirmationRequest;
use JWTAuth;
use App\PaymentConfirmation;

class PaymentConfirmationController extends Controller
{
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function showPaymentConfirmation($idUser)
    {
        $payment = PaymentConfirmation::where('user_id', $idUser)->first();
        $user = $this->user;

        if(isset($payment->user_id)==true){
            if($this->user->id == $payment->user_id){
                return response()->json([
                    'status'  => 200,
                    'user'    => $user,
                    'payment' => $payment,
                ]);
            }else{
                return response()->json([
                    'status'  => 403,
                    'message' => 'Forbidden',
                ],403);
            }
        }else{
            return response()->json([
                'status'  => 404,
                'message' => 'Payment Not Found',
            ],404);
        }
        
    }

    public function storePaymentConfirmation(PaymentConfirmationRequest $request)
    {

        $payment = new PaymentConfirmation;
        $payment = $request->all();
        $payment['user_id'] = $this->user->id;

        $checkUser = PaymentConfirmation::where('user_id', $this->user->id)->first();
        if(isset($checkUser->user_id)==true){
            return response()->json([
                'status'  => 400,
                'message' => 'You have make payment confirmation',
            ],400);
        }

        if(PaymentConfirmation::create($payment)){
            return response()->json([
                'status' => 200,
                'user'   => $this->user,
                'payment'   => $payment,
            ]);
            } else {
            return response()->json([
                'status'  => false,
                'message' => 'Payment could not be saved'
            ]);
        }
    }

    public function updatePaymentConfirmation(PaymentConfirmationRequest $request,$idUser)
    {
        $payment = PaymentConfirmation::where('user_id', $idUser)->first();

        if(isset($payment)){
            if($this->user->id !== $payment->user_id){
                return response()->json([
                    'status'  => 403,
                    'message' => 'Forbidden',
                ],403);
            }
        }else{
            return response()->json([
                'status'  => 400,
                'message' => 'You not make any payment confirmation yet',
            ],400);
        }

        $payment->user_id          = $this->user->id;
        $payment->pay_date         = $request->pay_date;
        $payment->bank_name        = $request->bank_name;
        $payment->bank_account     = $request->bank_account;
        $payment->proof_of_payment = $request->proof_of_payment;
        $payment->status           = $request->status;
        $payment->note             = $request->note;

        if(isset($payment)){
            if($payment->save()){
                return response()->json([
                    'status'  => 200,
                    'user'    => $this->user,
                    'payment'    => $payment,
                    'message' => 'Payment updated'
                ]);
                } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Payment could not be update'
                ]);
            }
        }else{
            return response()->json([
                'status'  => 403,
                'message' => 'Forbidden',
            ],403);
        }
    }

}
