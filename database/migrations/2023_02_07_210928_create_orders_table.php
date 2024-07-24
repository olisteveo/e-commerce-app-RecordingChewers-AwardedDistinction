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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column:'user_id')->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId(column:'product_id')->constrained()->onUpdate("cascade")->onDelete("cascade");
            // would link to a transaction table but not using actual transactions so just a field for now
            $table->string("transaction_id")->unique()->comment('order transaction id');
            $table->integer('quantity')->comment('quantity of product ordered');
            $table->decimal('subtotal',5,2)->comment('the total price of that order');
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
        Schema::dropIfExists('orders');
    }
};
