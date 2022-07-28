<?php

namespace Sifex\LaravelSlaTimer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Sifex\LaravelSlaTimer\Casts\SlaAgendaCollection;
use Sifex\SlaTimer\Interfaces\AgendaInterface;
use Sifex\SlaTimer\SLASchedule as SLATimerSchedule;

class SlaSchedule extends Model
{
    use HasFactory;

    protected $casts = [
        'agendas' => SlaAgendaCollection::class,
    ];

    protected $fillable = [
        'name',
        'agendas',
        'sla_schedule_scheme_id',
    ];

    public function slaScheduleSchemes(): BelongsTo
    {
        return $this->belongsTo(SlaScheduleScheme::class);
    }

    public function toSchedule(): SLATimerSchedule
    {
        return tap(SLATimerSchedule::create(), function ($schedule) {
            $schedule->agendas = $this->agendas->toArray();
        });
    }

    public static function fromSchedule(SLATimerSchedule $schedule, $name = 'Schedule'): self
    {
        return static::create([
            'name' => $name,
            'agendas' => $schedule->agendas
        ]);
    }
}
