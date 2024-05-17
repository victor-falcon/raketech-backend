<?php

namespace App\Console\Commands;

use App\Jobs\SyncCountryJob;
use Illuminate\Console\Command;

class SyncCountriesCommand extends Command
{
    protected $signature = 'app:sync-countries';

    protected $description = 'Sync countries from external provider with our database';

    public function handle(): int
    {
        SyncCountryJob::dispatch();

        $this->info('Countries sync job enqueued.');

        return self::SUCCESS;
    }
}
