<?php

namespace Database\Factories;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Portfolio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name(),
            'description'=> $this->faker->paragraph(),
            'service_id' =>\App\Models\Service::select('id')->get()->random()->id,
            'client_id' => \App\Models\Client::select('id')->get()->random()->id,
        ];
    }
}
