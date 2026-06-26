<?php

namespace Database\Factories;

use App\Models\OrderDetail;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDetail::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $food = Item::inRandomOrder()->first();
        return [
            'item_id' => $food ? $food->id : 1,
            'order_id' => $this->faker->numberBetween(2, 10001),
            'item_campaign_id' => null,
            'item_details' => $food ? json_encode($food->only(['id','name','price','discount','discount_type'])) : '{}',
            'price' => $food ? $food->price : 0,
            'quantity' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
