<?php

namespace Sifex\LaravelSlaTimer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Sifex\SlaTimer\SLABreach as SLATimerBreach;

class SlaBreachScheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * @return SLATimerBreach[]
     */
    public function toBreaches(): array
    {
        return collect($this->slaBreaches()->get())->map(function (SlaBreach $slaBreach) {
            return $slaBreach->toBreach();
        })->toArray();
    }

    public function slaBreaches(): HasMany
    {
        return $this->hasMany(SlaBreach::class);
    }
}
