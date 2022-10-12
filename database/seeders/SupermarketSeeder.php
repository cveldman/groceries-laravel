<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupermarketSeeder extends Seeder
{
    public function run()
    {
        DB::table('supermarkets')->insert([
            $this->seed('Albert Heijn'),
            $this->seed('Jumbo'),
       ]);
    }

    private function seed($name)
    {
        return [
            'name' => $name
        ];
    }
}
