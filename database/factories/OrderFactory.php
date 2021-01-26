<?php

namespace Database\Factories;

use App\ActionClass\Order\GenerateOrderCodeAction;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_code' => GenerateOrderCodeAction::execute(),
            'customer_name' => $this->faker->name,
            'customer_email' => $this->faker->email,
            'customer_mobile' => $this->faker->phoneNumber,
            'customer_surname'=>$this->faker->lastName,
            'customer_document'=>$this->faker->dni,
            'status' => Order::STATUS_CREATED,
        ];
    }
}
