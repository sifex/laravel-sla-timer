<?php

namespace Sifex\LaravelSlaTimer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Sifex\SlaTimer\SLABreach as SLATimerBreach;

/**
 * @property string $name
 * @property string $duration
 */
class SlaBreach extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'duration',
        'sla_breach_scheme_id',
    ];

    public function sla_breach_scheme(): BelongsTo
    {
        return $this->belongsTo(SlaBreachScheme::class);
    }

    public function toBreach(): SLATimerBreach
    {
        return new SLATimerBreach($this->name, $this->duration);
    }
}
