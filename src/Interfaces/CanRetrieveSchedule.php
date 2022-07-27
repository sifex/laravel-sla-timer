<?php

namespace Sifex\LaravelSlaTimer\Interfaces;

use Sifex\LaravelSlaTimer\Models\SlaScheduleScheme;

interface CanRetrieveSchedule
{
    public function getSlaScheduleScheme(): SlaScheduleScheme;
}
