<?php

namespace Sifex\LaravelSlaTimer\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Sifex\LaravelSlaTimer\Models\SlaScheduleScheme;

/**
 * @method belongsTo: BelongsTo
 */
trait HasSLAScheduleScheme
{
    public function slaScheduleScheme(): BelongsTo
    {
        return $this->belongsTo(SlaScheduleScheme::class);
    }
}
