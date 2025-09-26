<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'token'];

    // public function setTokenAttribute($token)
    // {   
    //     $this->attributes['token'] = str_random();
    // }
}
