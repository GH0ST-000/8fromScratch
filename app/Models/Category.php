<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    # remove additional blank line

    public  function  posts(){
        # remove additional blank line
        return $this->hasMany(Post::class);
    }
}
