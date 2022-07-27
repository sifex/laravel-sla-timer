<?php

namespace Sifex\LaravelSlaTimer;

use Sifex\LaravelSlaTimer\Commands\LaravelSlaTimerCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelSlaTimerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-sla-timer')
            ->hasConfigFile('sla')
            ->hasMigration('create_sla_breach_schemes_table')
            ->hasMigration('create_sla_breaches_table')
            ->hasMigration('create_sla_schedule_schemes_table')
            ->hasMigration('create_sla_schedules_table.php');
    }
}
