<?php

namespace App\Services\Countries\RestCountries;

use App\Collections\CountriesData;
use App\DataObjects\CountryData;
use App\Services\Countries\CountriesDataSyncProvider;
use Illuminate\Support\Facades\Http;

class RestCountriesDataSyncProvider implements CountriesDataSyncProvider
{
    public function all(): CountriesData
    {
        $items = Http::get('https://restcountries.com/v3.1/all')
            ->collect()
            ->map(function ($country) {
                return new CountryData(
                    name: $country['name']['common'],
                    cca3: $country['cca3'],
                    flag: $country['flags']['png'],
                );
            });

        return new CountriesData($items->all());
    }
}
