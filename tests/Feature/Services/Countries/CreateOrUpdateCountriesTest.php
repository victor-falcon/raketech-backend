<?php

namespace Tests\Services\Countries;

use App\Collections\CountriesData;
use App\DataObjects\CountryData;
use App\Services\Countries\CreateOrUpdateCountries;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

$countryCreatorOrUpdater = app()->get(CreateOrUpdateCountries::class);

it('creates expected countries from data', function () use ($countryCreatorOrUpdater) {
    $data = new CountriesData([
        new CountryData('Spain', 'SPA', fake()->imageUrl),
        new CountryData('France', 'FRA', fake()->imageUrl),
        new CountryData('Italy', 'ITA', fake()->imageUrl),
        new CountryData('Spain', 'SPA', fake()->imageUrl), // Add Spain again to ensure it's not created again
    ]);

    ($countryCreatorOrUpdater)($data);

    assertDatabaseCount('countries', 3);
    assertDatabaseHas('countries', ['name' => 'Spain', 'cca3' => 'SPA']);
    assertDatabaseHas('countries', ['name' => 'France', 'cca3' => 'FRA']);
    assertDatabaseHas('countries', ['name' => 'Italy', 'cca3' => 'ITA']);
});
