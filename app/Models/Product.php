<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
        'day_expiry_date',
        'week_expiry_date'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function Restraunt(){
        return $this->belongsTo(Restraunt::class, 'res_id');
    }
    public function pass(){
        return $this->belongsTo(Pass::class, 'valid_for_pass');
    }
}
