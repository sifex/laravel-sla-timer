<?php

namespace Sifex\LaravelSlaTimer\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Sifex\LaravelSlaTimer\LaravelSlaTimerServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Sifex\\LaravelSlaTimer\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelSlaTimerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }

    protected function defineDatabaseMigrations()
    {
//        $migration = include __DIR__.'/../database/migrations/create_sla_breach_schemes_table.php.stub';
//        $migration->up();
//        $migration = include __DIR__.'/../database/migrations/create_sla_breaches_table.php.stub';
//        $migration->up();
//        $migration = include __DIR__.'/../database/migrations/create_sla_schedule_schemes_table.php.stub';
//        $migration->up();
//        $migration = include __DIR__.'/../database/migrations/create_sla_schedules_table.php.stub';
//        $migration->up();

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
}
