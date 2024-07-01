<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_lists', function (Blueprint $table) {
            $table->id(); 
            $table->string('image');
            $table->string('barcode')->unique();
            $table->string('name');
            $table->string('arabic_name');
            $table->string('serial_no');
            $table->string('category');
            $table->string('unit');
            $table->decimal('purchase_price', total: 8, places: 2);
            $table->decimal('sale_price', total: 8, places: 2);
            $table->decimal('wholesale_price', total: 8, places: 2);
            $table->decimal('amount', total: 8, places: 2);
            $table->timestamps();
        });
    }
// php artisan make:migration create_example_table

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_lists');
    }
};
