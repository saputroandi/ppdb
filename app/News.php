<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable=['post_title','post_content','post_content'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
