<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeVerify extends Model
{
    protected $fillable=[
        'user_id',
        'code'
    ];
}
