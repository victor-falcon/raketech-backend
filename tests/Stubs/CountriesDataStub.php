<?php

namespace Tests\Stubs;

use App\Collections\CountriesData;
use App\DataObjects\CountryData;

class CountriesDataStub
{
    public static function default(): CountriesData
    {
        return new CountriesData([
            new CountryData('Spain', 'SPA', fake()->imageUrl),
            new CountryData('France', 'FRA', fake()->imageUrl),
            new CountryData('Italy', 'ITA', fake()->imageUrl),
        ]);
    }

    public static function withDuplicates(): CountriesData
    {
        return new CountriesData([
            new CountryData('Spain', 'SPA', fake()->imageUrl),
            new CountryData('France', 'FRA', fake()->imageUrl),
            new CountryData('Italy', 'ITA', fake()->imageUrl),
            new CountryData('Spain', 'SPA', fake()->imageUrl),
        ]);
    }
}
