<?php

namespace App\Jobs;

use App\Services\Countries\SyncCountries;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncCountryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly SyncCountries $syncCountries,
    ) {
    }

    public function handle(): void
    {
        $this->syncCountries->sync();
    }
}
