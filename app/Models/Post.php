<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public  function  getRouteKeyName()
    {
        return 'slug';
    } # Add blank line between functions
    public  function  category(){
        return $this->belongsTo(Category::class);
    } # Add blank line between functions
    public  function  comments(){
        return $this->hasMany(Comment::class);
    }




}
