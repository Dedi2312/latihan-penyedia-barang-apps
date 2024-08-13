<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'phone'=>'9087678998',
                'password'=>'1',
                'role'=>'admin',
            ],
            [
                'name'=>'user',
                'email'=>'user@gmail.com',
                'phone'=>'9087678998',
                'password'=>'1',
                'role'=>'user',
            ],
        ];
        foreach ($data as $key => $d){
            User::create($d);
        }
    }
}
