<?php

namespace App\Services\Countries;

use App\Collections\CountriesData;

interface CountriesDataSyncProvider
{
    public function all(): CountriesData;
}
