<?php

namespace Sifex\LaravelSlaTimer\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Sifex\LaravelSlaTimer\Models\SlaBreach;
use Sifex\LaravelSlaTimer\Models\SlaBreachScheme;

/**
 * @extends Factory
 */
class SlaBreachFactory extends Factory
{
    protected $model = SlaBreach::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'duration' => (($this->faker->numberBetween(0, 4) * 15).'m'),
            'sla_breach_scheme_id' => SlaBreachScheme::factory(),
        ];
    }
}
