<?php

namespace Sifex\LaravelSlaTimer\Traits;

use Sifex\LaravelSlaTimer\Models\SlaBreachScheme;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
