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

    public function slaScheduleSchemes(): BelongsTo
    {
        return $this->belongsTo(SlaScheduleScheme::class);
    }

    public function toSchedule(): SLATimerSchedule
    {
        return tap(SLATimerSchedule::create(), function (AgendaInterface $schedule) {
            $schedule->agendas = $this->agendas->toArray();
        });
    }
}
