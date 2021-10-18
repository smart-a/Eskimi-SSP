<?php

namespace Database\Factories;

use App\Models\Advert;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class AdvertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advert::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() : array
    {
        return [
            'advert_name' => $this->faker->name(),
            'date_from' => $this->faker->date(),
            'date_to' => $this->faker->date(),
            'total_budget' => 5,
            'daily_budget' => (5 * 4)
        ];
    }
}
