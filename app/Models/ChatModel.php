<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatModel extends Model
{
    use HasFactory;
    protected $table = 'chat_models';
    protected $fillable = ['from', 'to', 'message', 'is_read'];
    
}
