<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    protected $fillable = [
        'star1',
        'star2',
        'star3'
    ];


    public function add($star, $file, $name, $extension)
    {
        $prefix = 'https://zapjob.s3.amazonaws.com/';
        $filename = $name.'.'.$extension;
        $data[$name] = $prefix.$file->storeAs('starChanged', $filename, $options = ['ACL' => 'public-read']);
        $star->update($data);
    }
}
