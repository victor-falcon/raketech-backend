<?php

namespace App\Services\Countries;

use App\Collections\CountriesData;

interface CountrySyncProvider
{
    public function all(): CountriesData;
}
