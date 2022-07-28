<?php

use Sifex\LaravelSlaTimer\Casts\SlaAgendaCollection;
use Sifex\SlaTimer\SLASchedule as SlaTimerSchedule;

it('tests sla agenda attribute casting and uncasting', function () {
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
