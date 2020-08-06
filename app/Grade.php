<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable=['semester_1','semester_2','semester_3','semester_4','semester_5','semester_6'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
