<?php

namespace Sifex\LaravelSlaTimer\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Sifex\LaravelSlaTimer\Models\SlaScheduleScheme;

/**
 * @extends Factory
 */
class SlaScheduleSchemeFactory extends Factory
{
    protected $model = SlaScheduleScheme::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
