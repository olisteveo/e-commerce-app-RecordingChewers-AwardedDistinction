<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // randomly pick a user id between 1 and 40
        $user_id = rand(1,40);
        // randomly decide whether a artist id is null or linked
        // could have used a varying weighted randomised system
        // a simple 50/50 will suffice
        // determine whether the artist id will be linked or not
        // determine whether the artist id is null or random number 1 to 20
        $artist_id = rand(1,20);
        return [
            'supplier_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber,
            'address' => fake()->unique()->address,
            'artist_profiles_id' => NULL
        ];
    }
}
