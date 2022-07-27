<?php

namespace Sifex\LaravelSlaTimer\Interfaces;

use Sifex\LaravelSlaTimer\Models\SlaBreachScheme;

interface CanRetrieveBreaches
{
    public function getSlaBreachScheme(): SlaBreachScheme;
}
