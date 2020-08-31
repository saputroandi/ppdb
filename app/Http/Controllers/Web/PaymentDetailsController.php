<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentDetails;

class PaymentDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAllPaymentDetails()
    {
        if(auth()->user()->role_id == 1){
            $details = PaymentDetails::all();
            return view('admin.payment_details.index',['details'=>$details]);
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }

    public function inputPaymentDetails()
    {
        if(auth()->user()->role_id == 1){
            return view('admin.payment_details.input');
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }

    public function storePaymentDetails(Request $request)
    {
        $this->validate($request,[
            'cost_type' => 'required|string',
            'session_1' => 'required|int',
            'session_2' => 'required|int',
            'session_3' => 'required|int',
            'note'      => 'required',
        ]);
        $details            = new PaymentDetails;
        $details->cost_type = $request->cost_type;
        $details->session_1 = $request->session_1;
        $details->session_2 = $request->session_2;
        $details->session_3 = $request->session_3;
        $details->note      = $request->note;
        $details->save();
        return redirect('/payment-details/show')->with('success','Payment details has been added');
    }

    public function editPaymentDetails($id)
    {
        if(auth()->user()->role_id == 1){
            $details = PaymentDetails::find($id);
            return view('admin.payment_details.edit',['details'=>$details]);
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }

    public function updatePaymentDetails(Request $request,$id)
    {
        $this->validate($request,[
            'cost_type' => 'required|string',
            'session_1' => 'required|int',
            'session_2' => 'required|int',
            'session_3' => 'required|int',
            'note'      => 'required',
        ]);
        $details = PaymentDetails::find($id);
        $details->cost_type = $request->cost_type;
        $details->session_1 = $request->session_1;
        $details->session_2 = $request->session_2;
        $details->session_3 = $request->session_3;
        $details->note      = $request->note;
        $details->save();
        return redirect('/payment-details/show')->with('success','Payment details has been updated');
    }

    public function deletePaymentDetails($id)
    {
        if(auth()->user()->role_id == 1){
            $details=PaymentDetails::find($id);
            $details->delete();
            return redirect('/payment-details/show')->with('success','Payment details has been deleted');
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }
}
