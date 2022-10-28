<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstUser =  User::updateOrCreate(
            [
                'email' => 'parker@gmail.com',
            ],
            [
                'first_name' => 'Peter',
                'last_name' => 'Parker',
                'password' => Hash::make('12345678'), //only for demonstration.put hashed value on actual production
            ]
        );

    }
}
