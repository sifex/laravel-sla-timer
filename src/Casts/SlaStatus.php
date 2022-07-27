<?php

namespace Sifex\LaravelSlaTimer\Casts;

use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Sifex\SlaTimer\SLABreach;

class SlaStatus implements Castable
{
    public static function castUsing(array $arguments): CastsAttributes
    {
        return new class implements CastsAttributes
        {
            public function get($model, $key, $value, $attributes)
            {
                /** @var \Sifex\SlaTimer\SLAStatus $value */
                return [
                    'breaches' => collect($model->sla_status->breaches)->map(fn (SLABreach $breach) => ['breached' => $breach->breached, 'name' => $breach->name, 'breached_seconds' => $breach->breached_after->totalSeconds])->toArray(),
                    'seconds' => $model->sla_status->interval->totalSeconds,
                ];
            }

            public function set($model, string $key, $value, array $attributes)
            {
                // TODO: Implement set() method.
            }
        };
    }
}
