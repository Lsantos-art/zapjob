<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'name', 'slug', 'user_id', 'avatar'
    ];


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}



