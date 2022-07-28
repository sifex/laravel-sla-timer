<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Sifex\LaravelSlaTimer\Models\SlaBreach;
use Sifex\LaravelSlaTimer\Models\SlaBreachScheme;
use Sifex\LaravelSlaTimer\Models\SlaSchedule;
use Sifex\LaravelSlaTimer\Models\SlaScheduleScheme;
use Sifex\LaravelSlaTimer\Tests\models\Project;
use Sifex\LaravelSlaTimer\Tests\models\Ticket;
use Sifex\SlaTimer\SLASchedule as SlaTimerSchedule;
use function Spatie\PestPluginTestTime\testTime;

uses(RefreshDatabase::class);

it('tests basic functionality', function () {
    $ticket = Ticket::factory()->create();

    expect($ticket->sla_status->breaches)->toEqual([])
        ->and($ticket->sla_status->interval->totalSeconds)->toEqual(0);
});

it('tests basic functionality to Array', function () {
    $ticket = Ticket::factory()->create();

    expect($ticket->toArray()['sla_status']['breaches'])->toEqual([])
        ->and($ticket->toArray()['sla_status']['seconds'])->toEqual(0);
});

it('tests custom schedule', function () {
    $subject_start_time = '2022-07-23 08:59:00';
    $time_now = '2022-07-23 10:00:00';

    testTime()->freeze($time_now);

    /** @var SlaScheduleScheme $schedule_scheme */
    $schedule_scheme = SlaScheduleScheme::create([
        'name' => 'Testing',
    ]);

    /** @var SlaSchedule $schedule */
    $schedule = SlaSchedule::create([
        'agendas' => SlaTimerSchedule::create()->from('09:00')->to('17:30')->everyDay()->agendas,
        'name' => '9 to 5 Schedule',
        'sla_schedule_scheme_id' => $schedule_scheme->id,
    ]);

    $project = Project::factory()->create([
        'sla_schedule_scheme_id' => $schedule_scheme->id,
    ]);

    $ticket = Ticket::factory()->create([
        'project_id' => $project->id,
        'created_at' => Carbon::parse($subject_start_time),
    ]);

    expect($ticket->toArray()['sla_status']['seconds'])->toEqual(3600);
});

it('tests custom breaches', function () {
    $subject_start_time = '2022-07-23 08:59:00';
    $time_now = '2022-07-23 10:00:00';

    testTime()->freeze($time_now);

    /**
     * Breach Schemes
     */
    $breach_scheme = SlaBreachScheme::create([
        'name' => 'Testing',
    ]);

    $breach = SlaBreach::create([
        'name' => 'test',
        'duration' => '3500s',
        'sla_breach_scheme_id' => $breach_scheme->id,
    ]);

    /** @var SlaScheduleScheme $schedule_scheme */
    $schedule_scheme = SlaScheduleScheme::create([
        'name' => 'Testing',
    ]);

    /** @var SlaSchedule $schedule */
    $schedule = SlaSchedule::create([
        'agendas' => SlaTimerSchedule::create()->from('09:00')->to('17:30')->everyDay()->agendas,
        'name' => '9 to 5 Schedule',
        'sla_schedule_scheme_id' => $schedule_scheme->id,
    ]);

    $project = Project::factory()->create([
        'sla_schedule_scheme_id' => $schedule_scheme->id,
        'sla_breach_scheme_id' => $breach_scheme->id,
    ]);

    $ticket = Ticket::factory()->create([
        'project_id' => $project->id,
        'created_at' => Carbon::parse($subject_start_time),
    ]);

    expect($ticket->sla_status->interval->totalSeconds)->toEqual(3600)
        ->and($ticket->sla_status->breaches)->toHaveCount(1)
        ->and($ticket->toArray()['sla_status']['seconds'])->toEqual(3600);
});
