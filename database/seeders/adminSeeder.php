<?php

namespace Database\Seeders;

use App\Models\admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $password = Hash::make('12345678');

        $adminsRecord = [
            'id' => 1,
            'name' => 'Admin',
            'maritalstatus' => 'no',
            'gender' => 'male',
            'email' => 'wisamahmad786@gmail.com',
            'password' => $password,
            'dateofbirth' => '14 april 2002',
            'mobilenumber' => '33177067401',
            //  'address' => 'wah cantt',
            'type' => 'admin',
            'image' => "",
            'status' => '1',
        ];
        admin::insert($adminsRecord);


        $adminsChat = [

            'name' => 'Admin',
            'email' => 'wisamahmad786@gmail.com',
            'password' => $password,
        ];
        User::insert($adminsChat);
    }
}
