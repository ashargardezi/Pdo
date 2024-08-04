<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('json/brand.json'));
        $brands= json_decode($json, true);
        foreach($brands as $brand){
            DB::table('brannds')->insert($brand);  }
        
    }
}




// DB::table('barnds')->insert([
        //     'image' => 'upload/image.png',
        //     'brand_name' => 'apple'


        // ]);