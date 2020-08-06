<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentConfirmation extends Model
{
    protected $fillable=['pay_date','bank_name','bank_account','status','note'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
