<?php

namespace Tests\Console\Commands;

use App\Jobs\SyncCountryJob;
use Queue;

use function Pest\Laravel\artisan;

it('enqueue expected job', function () {
    Queue::fake();

    artisan('app:sync-countries')->assertSuccessful();

    Queue::assertPushed(SyncCountryJob::class);
});
