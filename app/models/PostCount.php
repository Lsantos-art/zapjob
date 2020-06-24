<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PostCount extends Model
{
    protected $fillable = ['used', 'user_id'];
}
