<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StockCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json=File::get(database_path('json/stockcount.json'));
        $stocks = json_decode($json, true);
        foreach ($stocks as $stock) {
            DB::table('stock_counts')->insert($stock);

        }
        


        // DB::table('stock_counts')->insert([
        //     'product_name'=> 'cake',
        //     'unit' => 'kg',
        //     'quantity' =>'4',
        //     'unit_price' => '500',
        //     'total_Price'=>'2608'
            
        // ]);
    }
}
