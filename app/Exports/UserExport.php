<?php

namespace App\Exports;

use App\Models\Test;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    public function headings():array{
        return [
            'id', 'first_name', 'last_name', 'email', 'Phone', 'location',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {        
        // return collect(User::getUser()); 
        return Test::all();
    }
}
