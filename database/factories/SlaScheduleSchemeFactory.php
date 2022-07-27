<?php

namespace Database\Factories\SLA;

use App\Models\SlaScheduleScheme;
use Illuminate\Database\Eloquent\Factories\Factory;

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
