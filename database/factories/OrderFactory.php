<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id = rand(1, 29);
        $product_id = rand(1, 60);
        $pounds = rand(6, 18);
        $pence = (rand(0,1)) ? 49 : 99;
        $subtotal = floatval("{$pounds}.{$pence}");
        $quantity = (rand(0,1)) ? 1 : rand(1, 6);
        $created = fake()->dateTimeBetween("-1 year", "now");

        return [
            'user_id' => $user_id,
            'product_id' => $product_id,
            'transaction_id' => fake()->uuid(),
            'quantity' => $quantity,
            'subtotal' => $subtotal,
            'created_at' => $created,
            'updated_at' => $created
            
        ];
    }
}
