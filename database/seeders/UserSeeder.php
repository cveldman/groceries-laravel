<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            $this->seed('Corné Veldman', 'cveldman@hotmail.com', 'password')
        ]);
    }

    private function seed($name, $email, $password)
    {
        return [
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ];
    }
}
