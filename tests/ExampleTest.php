<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Sifex\LaravelSlaTimer\Tests\models\Ticket;

uses(RefreshDatabase::class);

it('tests basic functionality', function () {
    $ticket = Ticket::factory()->create();

    $this->assertModelExists($ticket);
});
