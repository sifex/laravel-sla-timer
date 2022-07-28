<?php

namespace Sifex\LaravelSlaTimer\Tests\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Sifex\LaravelSlaTimer\Models\SlaBreachScheme;
use Sifex\LaravelSlaTimer\Models\SlaScheduleScheme;

class Project extends Model
{
    use HasFactory;

    public function slaScheduleScheme(): BelongsTo
    {
        return $this->belongsTo(SlaScheduleScheme::class);
    }

    public function slaBreachScheme(): BelongsTo
    {
        return $this->belongsTo(SlaBreachScheme::class);
    }
}
