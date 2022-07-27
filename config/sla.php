<?php

use Sifex\LaravelSlaTimer\Models\SlaBreach;
use Sifex\LaravelSlaTimer\Models\SlaBreachScheme;
use Sifex\LaravelSlaTimer\Models\SlaSchedule;
use Sifex\LaravelSlaTimer\Models\SlaScheduleScheme;

return [

    'cache' => [
        'enabled' => false, // TODO
    ],

    'eloquent' => [
        'schedule' => [
            'table' => 'sla_schedules',
            'model' => SLASchedule::class,
        ],
        'schedule_scheme' => [
            'table' => 'sla_schedule_schemes',
            'model' => SLAScheduleScheme::class,
        ],
        'breach' => [
            'table' => 'sla_breaches',
            'model' => SLABreach::class,
        ],
        'breach_scheme' => [
            'table' => 'sla_breach_schemes',
            'model' => SLABreachScheme::class,
        ],
    ],
];
