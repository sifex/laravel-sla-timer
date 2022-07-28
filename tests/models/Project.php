<?php

namespace Sifex\LaravelSlaTimer\Tests\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Sifex\LaravelSlaTimer\Models\SlaBreachScheme;
use Sifex\LaravelSlaTimer\Models\SlaScheduleScheme;
use Sifex\LaravelSlaTimer\Tests\database\factories\ProjectFactory;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'sla_schedule_scheme_id',
        'sla_breach_scheme_id',
    ];

    public function slaScheduleScheme(): BelongsTo
    {
        return $this->belongsTo(SlaScheduleScheme::class);
    }

    public function slaBreachScheme(): BelongsTo
    {
        return $this->belongsTo(SlaBreachScheme::class);
    }

    protected static function newFactory()
    {
        return ProjectFactory::new();
    }
}
