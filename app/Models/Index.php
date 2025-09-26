<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Index extends Model
{
    use HasFactory;

    public function CommonContent(){
        $result['arr1'] = ['name1'=> 'Mohammad Zaid1'];
        $result['arr2'] = ['name2'=> 'Mohammad Zaid2'];
        return $result;
    }
}
