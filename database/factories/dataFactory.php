<?php

namespace Database\Factories;

use App\Models\data;
use Illuminate\Database\Eloquent\Factories\Factory;

class dataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = data::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'kota_origin' => $this->faker->word,
        'kota_destinasi' => $this->faker->word,
        'kendaraan' => $this->faker->word,
        'harga' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
