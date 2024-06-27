<?php

namespace Database\Seeders;

use App\Models\employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');

        $adminsRecord = [
            'id' => 1,
            'name' => 'Admin',
            'martialstatus' => 'yes',
            'gender' => 'male',
            'password' => $password,
            'dateofbirth' => '14 april 2002',
            'email' => 'wisam@gmail.com',
            'mobilenumber' => '12345676543',
            'address' => "okay",
        ];
        employee::insert($adminsRecord);
    }
}
