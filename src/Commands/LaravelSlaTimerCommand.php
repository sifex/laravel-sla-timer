<?php

namespace Sifex\LaravelSlaTimer\Commands;

use Illuminate\Console\Command;

class LaravelSlaTimerCommand extends Command
{
    public $signature = 'laravel-sla-timer';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
