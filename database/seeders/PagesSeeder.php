<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(["name" => "about-us", "title" => "About Us", "content" => fake()->paragraphs(7, true)]);
        Page::create(["name" => "contact-us", "title" => "Contact", "content" => fake()->paragraphs(3, true)]);
        Page::create(["name" => "products", "title" => "Products", "content" => fake()->paragraphs(3, true)]);
        Page::create(["name" => "artists", "title" => "Artists", "content" => fake()->paragraphs(3, true)]);
        Page::create(["name" => "sample-upload", "title" => "Upload", "content" => fake()->paragraphs(3, true)]);
        Page::create(["name" => "become-artist", "title" => "How to become an artist", "content" => $this->getBecomeArtistText()]);
        Page::create(["name" => "home", "title" => "Welcome to Recording Chewers", "content" => fake()->paragraphs(3, true)]);

    }


    protected static function getBecomeArtistText()
    {
        return "
        To Create a <i><strong>Recording Chewers</strong> Artist Account</i> Upload a Music Sample to the Upload Page!";
    }

}
