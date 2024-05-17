<?php

namespace App\Services\Countries;

use App\Collections\Countries;
use App\Models\Country;

class GetAllCountries
{
    public function __invoke(): Countries
    {
        return Country::all();
    }
}
