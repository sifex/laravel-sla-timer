<?php

namespace Sifex\LaravelSlaTimer\Tests\database\migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(config('sla.eloquent.schedule_scheme.model'));
            $table->foreignIdFor(config('sla.eloquent.breach_scheme.model'));

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
