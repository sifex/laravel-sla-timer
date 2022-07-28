<?php

namespace Sifex\LaravelSlaTimer\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Sifex\LaravelSlaTimer\Models\SlaBreachScheme;

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
