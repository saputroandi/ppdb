<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable=['user_id','img_semester_1','img_semester_2','img_semester_3','img_semester_4','img_semester_5','img_semester_6','img_skhun','img_akta','img_kk'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
