<?php

namespace Database\Factories\SLA;

use App\Models\SlaSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class SlaScheduleFactory extends Factory
{
    protected $model = SlaSchedule::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'agendas' => \Sifex\SlaTimer\SLASchedule::create()->from('09:00')->to('17:30')->agendas,
        ];
    }
}
