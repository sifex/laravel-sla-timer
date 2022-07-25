<?php

namespace Sifex\LaravelSlaTimer;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Sifex\LaravelSlaTimer\Commands\LaravelSlaTimerCommand;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-sla-timer_table')
            ->hasCommand(LaravelSlaTimerCommand::class);
    }
}