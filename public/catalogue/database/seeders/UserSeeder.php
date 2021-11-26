<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstNames = [
            "Kyndal",
            "Aleah",
            "Lillyan",
            "Eldana",
            "Raena",
            "Simeon",
            "Johnathan",
            "Kierstyn",
            "Aeden",
            "Bianca",
        ];
        $lastNames = [
            "Delaney",
            "Meacham",
            "Hershberger",
            "Cooke",
            "Chenoweth",
            "Forrester",
            "Espino",
            "Hersey",
            "Hinshaw",
            "Nelsen"
        ];
        $roles = ["Guest", "User", "Moderator"];
        $users = [];
        for ($i = 0; $i < 10; $i++) {
            array_push(
                $users,
                [
                    "email" => $firstNames[$i] . $lastNames[$i] . "@gmail.com",
                    "firstname" => $firstNames[$i],
                    "lastname" => $lastNames[$i],
                    "username" => substr($firstNames[$i], 0, 1) . $lastNames[$i],
                    "role" => $roles[rand(0, 2)],
                    "disabled" => rand(0, 1),
                    'password' => Hash::make('password'),
                ]
            );
        }
        DB::table('users')->insert($users);
    }
}
