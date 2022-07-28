<?php

namespace Sifex\LaravelSlaTimer\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Sifex\LaravelSlaTimer\Models\SlaBreachScheme;

/**
 * @method belongsTo: BelongsTo
 */
trait HasBreachScheme
{
    public function slaBreachScheme(): BelongsTo
    {
        return $this->belongsTo(SlaBreachScheme::class);
    }
}
