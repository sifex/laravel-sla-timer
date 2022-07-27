<?php

namespace Sifex\LaravelSlaTimer\Casts;

use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Sifex\SlaTimer\Agenda\Weekly;

class SlaAgendaCollection implements Castable
{
    public static function castUsing(array $arguments): CastsAttributes
    {
        return new class implements CastsAttributes
        {
            public function get($model, $key, $value, $attributes)
            {
                /**
                 * To a collection of AgendaInterfaces
                 */
                $value = json_decode($value);

                return collect($value)->map(function ($agenda_params) {
                    return (new Weekly)->setDays($agenda_params[0])->addTimePeriods($agenda_params[1]);
                });
            }

            public function set($model, $key, $value, $attributes)
            {
                /**
                 * To Primitives only:
                 *
                 * [ Agendas
                 *      [ Days[], TimePeriods[ [0,1] ] ]
                 * ]
                 */
                return json_encode(
                    collect($value)->map(function (Weekly $agenda) {
                        return [$agenda->days, $agenda->time_periods];
                    })->toArray()
                );
            }
        };
    }
}
