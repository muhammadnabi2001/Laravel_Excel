<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kitob extends Model
{
    protected $fillable=[
        'name',
        'author',
        'price',
    ];
}
