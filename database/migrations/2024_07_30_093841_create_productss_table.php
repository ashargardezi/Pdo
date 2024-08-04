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
        Schema::create('productss', function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing BIGINT column named 'id'
            $table->string('product_name');
            $table->string('serial_no')->nullable();
            $table->string('model_no')->nullable();
            $table->unsignedBigInteger('barcode_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('group')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->decimal('purchase_price', 10, 2);
            $table->decimal('sale_price', 10, 2);
            $table->decimal('whole_sale_price', 10, 2);
            $table->unsignedBigInteger('stock_id')->nullable();
            $table->boolean('featured')->default(0);
            $table->string('product_image')->nullable();
            $table->text('product_details')->nullable();
            $table->timestamps(); // This adds 'created_at' and 'updated_at' columns

            // Define foreign key constraints
            // $table->foreign('barcode_id')
            //     ->references('id')
            //     ->on('print_barcodes')
            //     ->onDelete('set null');

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // $table->foreign('stock_id')
            //     ->references('id')
            //     ->on('stock_counts')
            //     ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productss');
    }
};
