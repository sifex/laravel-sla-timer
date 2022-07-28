<?php

namespace Sifex\LaravelSlaTimer\Tests\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Sifex\LaravelSlaTimer\Models\SlaBreachScheme;
use Sifex\LaravelSlaTimer\Models\SlaScheduleScheme;
use Sifex\LaravelSlaTimer\Tests\models\Project;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'sla_schedule_scheme_id' => SlaScheduleScheme::factory()->hasSlaSchedules(3),
            'sla_breach_scheme_id' => SlaBreachScheme::factory()->hasSlaBreaches(3),

        ];
    }
}
