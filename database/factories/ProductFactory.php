<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $genre = [
            "Classical",
            "Rock",
            "country",
            "Folk",
            "Pop",
            "Metal",
            "Death Metal",
            "Rap"
        ];

        $medium = [
            "Cassette",
            "CD",
            "Vinyl",
            "DVD"
        ];

        $artwork = [
           "app3image1.jpg",
           "app3image2.jpg",
           "app3image3.jpg",
           "app3image4.jpg",
           "app3image5.jpg",
           "app3image6.jpg",
           "app3image7.jpg",
           "app3image8.jpg",
           "app3image9.jpg",
           "app3image10.jpg",
           "app3image11.jpg",
           "app3image12.jpg",
           "app3image13.jpg",
           "app3image14.jpg",
           "app3image15.jpg",
           "app3image16.jpg",
           "app3image17.jpg",
           "app3image18.jpg",
           "app3image19.jpg",
           "app3image20.jpg",
           "app3image21.jpg",
           "app3image22.jpg",
           "app3image23.jpg",
           "app3image24.jpg",
           "app3image25.jpg",
           "app3image26.jpg",
           "app3image27.jpg",
           "app3image28.jpg",
           "app3image29.jpg",
           "app3image30.jpg",
           "app3image31.jpg",
           "app3image32.jpg",
           "app3image33.jpg",
           "app3image34.jpg",
           "app3image35.jpg",
           "app3image36.jpg",
           "app3image37.jpg",
           "app3image38.jpg",
           "app3image39.jpg",
        ];

        // selecting a random entry from each factory produced record
        $genre = $genre[rand(0, count($genre)-1)]; // count the available genres and select a random genre for the record
        $artwork = $artwork[rand(0, count($artwork)-1)];
        $medium = $medium[rand(0, count($medium)-1)];
        $pounds = rand(6, 18);
        $pence = (rand(0,1)) ? 49 : 99;
        $retail_price = floatval("{$pounds}.{$pence}");
        $trade_price = 6.99;
        $hot_product = rand(1,10) > 8 ? true : false;
        $supplier_id = rand(1, 19);
        return [
            'product_name' => fake()->name(),
            'artist_name' => fake()->name(),
            'artwork' => $artwork,
            'genre' => $genre,
            'medium' => $medium,
            'publication_date' => fake()->dateTimeBetween('-30 years', 'now'),
            'stock' => fake()->numberBetween($min = 1, $max = 30),
            'retail_price' => $retail_price,
            'trade_price' => $trade_price,
            'hot_product' => $hot_product,
            'supplier_id' => $supplier_id,
        ];
    }
}
