<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            $this->seed('Witbrood', 'https://static-images.jumbo.com/product_images/080820191446_39748STK-2_360x360_2.png'),
            $this->seed('Bruinbrood', 'https://static-images.jumbo.com/product_images/080820191446_39766STK-2_360x360_2.png'),
            $this->seed('Volkorenbrood ', 'https://static-images.jumbo.com/product_images/200820191304_39778STK-2_360x360_2.png')
        ]);
    }

    private function seed($name, $image)
    {
        return [
            'name' => $name,
            'image' => $image
        ];
    }
}
