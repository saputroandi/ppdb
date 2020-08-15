<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentDetailsRequest;
use JWTAuth;
use App\PaymentDetails;

class PaymentDetailsController extends Controller
{
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function showPaymentDetails()
    {
        $payment = PaymentDetails::all();
        $user = $this->user;

            return response()->json([
                'status'  => 200,
                'user'    => $user,
                'payment' => $payment,
            ]);
    }

    public function storePaymentDetails(PaymentDetailsRequest $request)
    {

        $payment = new PaymentDetails;
        $payment = $request->all();

        if(PaymentDetails::create($payment)){
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

    public function updatePaymentDetails(PaymentDetailsRequest $request,$id)
    {
        $payment = PaymentDetails::find($id);

        if(isset($payment)==false){
            return response()->json([
                'status'  => 400,
                'message' => 'You not make any payment details yet',
            ],400);
        }

        $payment->cost_type = $request->cost_type;
        $payment->session_1 = $request->session_1;
        $payment->session_2 = $request->session_2;
        $payment->session_3 = $request->session_3;
        $payment->note      = $request->note;

        if(isset($payment)){
            if($payment->save()){
                return response()->json([
                    'status'  => 200,
                    'user'    => $this->user,
                    'payment'    => $payment,
                    'message' => 'Payment details updated'
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
