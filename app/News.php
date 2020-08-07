<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable=['user_id','post_title','post_content'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
