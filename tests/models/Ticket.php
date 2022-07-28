<?php

namespace Sifex\LaravelSlaTimer\Tests\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sifex\LaravelSlaTimer\Interfaces\CanRetrieveBreaches;
use Sifex\LaravelSlaTimer\Interfaces\CanRetrieveSchedule;
use Sifex\LaravelSlaTimer\Models\SlaBreachScheme;
use Sifex\LaravelSlaTimer\Models\SlaScheduleScheme;
use Sifex\LaravelSlaTimer\Tests\database\factories\ProjectFactory;
use Sifex\LaravelSlaTimer\Traits\HasSlaTracking;

class Ticket extends Model implements CanRetrieveBreaches, CanRetrieveSchedule
{
    use HasSlaTracking;
    use HasFactory;

    public function getSlaBreachScheme(): SlaBreachScheme
    {
        return SlaBreachScheme::factory()->create();
    }

    public function getSlaScheduleScheme(): SlaScheduleScheme
    {
        return SlaScheduleScheme::factory()->create();
    }

    protected static function newFactory()
    {
        return ProjectFactory::new();
    }
}
