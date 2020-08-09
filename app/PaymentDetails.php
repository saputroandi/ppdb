<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    protected $fillable=['cost_type','session_1','session_2','session_3','note'];
}
