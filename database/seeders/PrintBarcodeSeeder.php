<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PrintBarcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json=File::get(database_path('json/printbarcode.json'));
        $barcodes= json_decode($json, true);
        foreach($barcodes as $barcode){
        DB::table('print_barcodes')->insert($barcode);

        }
        // DB::table('print_barcodes')->insert([
        //     'product_name'=> 'chocklate',
        //     'barcode'=> '00000123',
        //     'price'=> '100'

        // ]);
    }
}
