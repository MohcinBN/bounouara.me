<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // create protect array to help us when we want to create instance using model
    protected $fillable = ['title', 'description', 'image'];
}
