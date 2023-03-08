<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    // ダミーデータの準備
    public function definition()
    {
        $decade = $this->faker->dateTimeThisDecade;
        $created_at = $decade->modify('+2 years');

        return [
            'customer_id' => rand(1, Customer::count()),
            'status' => $this->faker->boolean,
            'created_at' => $created_at
        ];
    }
}
