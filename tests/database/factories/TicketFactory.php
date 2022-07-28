<?php

namespace Sifex\LaravelSlaTimer\Tests\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Sifex\LaravelSlaTimer\Tests\models\Project;
use Sifex\LaravelSlaTimer\Tests\models\Ticket;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
        ];
    }
}
