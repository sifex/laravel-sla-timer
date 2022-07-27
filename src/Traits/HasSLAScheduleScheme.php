<?php

namespace Sifex\LaravelSlaTimer\Traits;

use Sifex\LaravelSlaTimer\Models\SlaScheduleScheme;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
