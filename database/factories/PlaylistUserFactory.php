<?php

namespace Database\Factories;

use App\Models\PlaylistUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PlaylistUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'playlist_id' => $this->faker->randomDigitNotNull,
        'subscription_id' => $this->faker->randomDigitNotNull,
        'start_date' => $this->faker->word,
        'status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
