<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $table = 'categories';

    protected $fillable = ['cat_id'];


    public function posts()
    {
        return $this->hasMany(Post::class, 'id');
    }

    // load latest posts


}
