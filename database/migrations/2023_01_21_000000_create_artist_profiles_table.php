<?php

/**
 * ******Laravel migrations******
 * -Migrations allow dev to create and update database schema
 * -Migrations are used to create all database tables and relations between them
 * -Table names for laravel migrations must be plural for the tables to connect correctly with relations
 * -Migration files to create tables must be created in correct order (unreliant tables created first)
 */


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
        // migration schema create table for artist profile
        Schema::create('artist_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('name of the artist');
            $table->string('profile_pic')->comment('image of/related to the artist');
            $table->mediumText('description')->comment('description of the artist');
            $table->string('song_sample')->comment('the file name for artists upload song sample');
            $table->string('song_sample_name')->comment('the name of the artists upload song sample');
            $table->string('song_sample_comments')->comment('comments about the artist upload');
            $table->string('song_art')->comment('artwork for the artists upload');
            $table->foreignId(column:'user_id')->constrained()->onUpdate("cascade")->onDelete("cascade");
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
        Schema::dropIfExists('artist_profile');
    }
};
