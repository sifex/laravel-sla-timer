<?php

namespace Database\Factories\SLA;

use App\Models\SlaBreachScheme;
use Illuminate\Database\Eloquent\Factories\Factory;

class SlaBreachSchemeFactory extends Factory
{
    protected $model = SlaBreachScheme::class;

    public function definition(): array
    {
        return [
            'name' => 'Test',
        ];
    }
}
