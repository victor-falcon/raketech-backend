<?php

namespace App\Services\Countries;

readonly class SyncCountries
{
    public function __construct(
        private CountriesDataSyncProvider $provider,
        private CreateOrUpdateCountries $createOrUpdateCountries,
    ) {
    }

    public function sync(): void
    {
        $data = $this->provider->all();
        ($this->createOrUpdateCountries)($data);
    }
}
