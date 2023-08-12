<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'username'=>'sharjeel',
                'email'=>'sharjeel@gmail.com',
                'password'=>'Admin13245.',
                'profilepicture' => 'NO prifileImage',
                'role' => 1,
            ],
            [
                'username'=>'sajid',
                'email'=>'sajid@gmaill.com',
                'password'=>'User12345.',
                'profilepicture' => 'NO prifileImage',
                'role' => 2,
            ],
            
        ]);

    }
}
