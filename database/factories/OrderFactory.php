<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
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
        $possible_statuses = ['in_card', 'bought', 'in_delivery'];
        return [
            'user_id' => User::all()->random()->id,
            'product_id' => Product::all()->random()->id,
            'status' => $possible_statuses[array_rand($possible_statuses)]
        ];
    }
}
