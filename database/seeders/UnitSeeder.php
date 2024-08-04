<?php

namespace Database\Seeders;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
       
        $json = File::get(database_path('json/units.json'));
        $units= json_decode($json, true);
        foreach($units as  $unit)
        DB::table('units')->insert($unit);


    }
}
