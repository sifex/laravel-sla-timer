<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Sifex\LaravelSlaTimer\Casts\SlaAgendaCollection;
use Sifex\LaravelSlaTimer\Models\SlaSchedule;
use Sifex\LaravelSlaTimer\Models\SlaScheduleScheme;
use Sifex\LaravelSlaTimer\Tests\models\Project;
use Sifex\LaravelSlaTimer\Tests\models\Ticket;
use Sifex\SlaTimer\SLASchedule as SlaTimerSchedule;
use function Spatie\PestPluginTestTime\testTime;

it('tests sla agenda attribute casting and uncasting', function() {

    $agendas = SlaTimerSchedule::create()->from('09:00')->to('17:30')->everyDay()->agendas;
    $cast = new SlaAgendaCollection();
    $json = $cast::castUsing([])->set(
        null,
        null,
        $agendas,
        null
    );
    $compared = $cast::castUsing([])->get(
        null,
        null,
        $json,
        null
    );

    expect($compared->toArray())->toEqual($agendas);
});
