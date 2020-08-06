<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MajorInterest extends Model
{
    protected $fillable=['name'];
    
    public function forms()
    {
        $this->hasMany(Form::class,'majors_interest_id');
    }
}
