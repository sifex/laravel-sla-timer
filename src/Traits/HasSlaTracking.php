<?php

namespace Sifex\LaravelSlaTimer\Traits;

use Illuminate\Database\Eloquent\Model;
use Sifex\LaravelSlaTimer\Interfaces\CanRetrieveBreaches;
use Sifex\LaravelSlaTimer\Interfaces\CanRetrieveSchedule;
use Sifex\LaravelSlaTimer\Models\SlaBreachScheme;
use Sifex\LaravelSlaTimer\Models\SlaScheduleScheme;
use Sifex\SlaTimer\SLA as SLATimer;
use Sifex\SlaTimer\SLABreach as SLATimerBreach;
use Sifex\SlaTimer\SLASchedule as SLATimerSchedule;
use Sifex\SlaTimer\SLAStatus as SLATimerStatus;

/**
 * @extends Model
 * @property SlaScheduleScheme $schedule_scheme
 * @property SlaBreachScheme $breach_scheme
 * @property SLATimerStatus $sla_status
 * @implements CanRetrieveBreaches
 * @implements CanRetrieveSchedule
 */
trait HasSlaTracking
{
    private string $sla_start_field = 'created_at';

    private function getSlaStatus(): SLATimerStatus
    {
        return SLATimer::fromSchedules(
            $this->getAllSlaSchedules()
        )->addBreaches(
            $this->getAllSlaBreaches()
        )->status(
            $this->getSlaStartTime(),
            $this->getSlaStopTime()
        );
    }

    public function getSlaStatusAttribute()
    {
        return $this->getSlaStatus();
    }

    /**
     * @return SLATimerSchedule[]
     */
    private function getAllSlaSchedules(): array
    {
        return $this->getSlaScheduleScheme()->toSchedules();
    }

    /**
     * @return SLATimerBreach[]
     */
    private function getAllSlaBreaches(): array
    {
        return $this->getSlaBreachScheme()->toBreaches();
    }

    private function getSlaStartTime(): string
    {
        return $this->{$this->sla_start_field};
    }

    private function getSlaStopTime(): ?string
    {
        return null;
    }
}
