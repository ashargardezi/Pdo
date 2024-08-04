<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameBarndsToBrands extends Migration
{
    public function up()
    {
        // Check if the `brands` table already exists
        if (!Schema::hasTable('brands')) {
            Schema::rename('barnds', 'brands');
        } else {
            // Optionally, you could drop the `barnds` table if it's not needed
            // Schema::drop('barnds');
        }
    }

    public function down()
    {
        // You should implement the reverse of your `up` method here
        // if necessary
    }
}
