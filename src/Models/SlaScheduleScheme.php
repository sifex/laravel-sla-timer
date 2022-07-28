<?php

namespace Sifex\LaravelSlaTimer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Sifex\SlaTimer\SLASchedule as SLATimerSchedule;

class SlaScheduleScheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * @return SLATimerSchedule[]
     */
    public function toSchedules(): array
    {
        return collect($this->slaSchedules()->get())->map(function (SlaSchedule $schedule) {
            return $schedule->toSchedule();
        })->toArray();
    }

    public function slaSchedules(): HasMany
    {
        return $this->hasMany(SlaSchedule::class);
    }
}
