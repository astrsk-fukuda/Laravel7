<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'contents'
    ];
}