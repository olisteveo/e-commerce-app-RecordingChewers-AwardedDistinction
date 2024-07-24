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
        // migration schema create table for suppliers table
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name')->comment('name of the supplier');
            $table->string('email')->comment('the suppliers email address');
            $table->string('phone')->comment('the suppliers contact phone number');
            $table->string('address')->comment('the suppliers address');
            $table->foreignId(column:'artist_profiles_id')->nullable()->constrained()->onUpdate("cascade")->onDelete("cascade");
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
        Schema::dropIfExists('suppliers');
    }
};
