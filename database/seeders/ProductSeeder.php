<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $json = File::get(database_path('json/products.json'));
        $products= json_decode($json, true);
        foreach($products as  $product)
        DB::table('products')->insert($product);
    }
}
