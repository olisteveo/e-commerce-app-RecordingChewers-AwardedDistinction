<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // migration schema create table for products table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->comment('name of the product');
            $table->string('artist_name')->comment('name of the artist');
            $table->string('artwork')->comment('artwork for the product');
            $table->string('genre')->comment('the products genre');
            $table->string('medium')->comment('the medium of the product');
            $table->date('publication_date')->comment('the publication date of the product');
            $table->string('stock')->comment('how much stock is available for that product');
            $table->decimal('retail_price',5,2)->comment('the retail price of that product');
            $table->decimal('trade_price',5,2)->comment('the trade price of that product');
            $table->boolean('hot_product')->nullable()->comment('boolean hot product flag to indicate if product is hot or not');
            $table->foreignId(column:'supplier_id')->nullable()->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
