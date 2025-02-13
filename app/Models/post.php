<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = "posts";
    protected $fillable = ['title','slug','description','content','status','thumbnail','user_id'];
}
