<?php

namespace Sifex\LaravelSlaTimer\Tests\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sifex\LaravelSlaTimer\Casts\SlaStatus;
use Sifex\LaravelSlaTimer\Interfaces\CanRetrieveBreaches;
use Sifex\LaravelSlaTimer\Interfaces\CanRetrieveSchedule;
use Sifex\LaravelSlaTimer\Models\SlaBreachScheme;
use Sifex\LaravelSlaTimer\Models\SlaScheduleScheme;
use Sifex\LaravelSlaTimer\Tests\database\factories\TicketFactory;
use Sifex\LaravelSlaTimer\Traits\HasSlaTracking;

class Ticket extends Model implements CanRetrieveBreaches, CanRetrieveSchedule
{
    use HasSlaTracking;
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'project_id',
        'created_at',
    ];

    protected $casts = [
        'sla_status' => SlaStatus::class,
    ];

    protected $appends = [
        'sla_status',
    ];

    public function getSlaBreachScheme(): SlaBreachScheme
    {
        return $this->project->slaBreachScheme;
    }

    public function getSlaScheduleScheme(): SlaScheduleScheme
    {
        return $this->project->slaScheduleScheme;
    }

    protected static function newFactory()
    {
        return TicketFactory::new();
    }

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
