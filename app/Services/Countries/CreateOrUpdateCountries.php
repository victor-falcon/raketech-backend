<?php

namespace App\Services\Countries;

use App\Collections\CountriesData;
use App\DataObjects\CountryData;
use App\Models\Country;

class CreateOrUpdateCountries
{
    public function __invoke(CountriesData $countries): void
    {
        $countries->each(function (CountryData $data) {
            Country::updateOrCreate(
                ['cca3' => $data->cca3],
                [
                    'name' => $data->name,
                    'flag' => $data->flag,
                ]
            );
        });
    }
}
