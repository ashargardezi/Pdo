<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    
    public function run(): void
    {
        $json = File::get(database_path('json/category.json'));
        
        $categories = json_decode($json, true);
        
        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
