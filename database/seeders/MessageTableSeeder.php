<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'from' =>'31',
            'to' =>'32',
            'message' =>'Message From First',
            'is_read' =>'1',
        ]);
        Message::create([
            'from' =>'32',
            'to' =>'31',
            'message' =>'Message From Second',
            'is_read' =>'1',
        ]);
    }
}
