<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable=['user_id','schedule_title','schedule_date','schedule_time','schedule_content'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
