<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentConfirmation extends Model
{
    protected $fillable=['user_id','pay_date','bank_name','bank_account','proof_of_payment','status','note'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
