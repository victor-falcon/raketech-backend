<?php

namespace Tests\Services\Countries;

use App\Services\Countries\CreateOrUpdateCountries;
use Tests\Stubs\CountriesDataStub;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

$countryCreatorOrUpdater = app()->get(CreateOrUpdateCountries::class);

it('creates expected countries from data', function () use ($countryCreatorOrUpdater) {
    ($countryCreatorOrUpdater)(CountriesDataStub::withDuplicates());

    assertDatabaseCount('countries', 3);
    assertDatabaseHas('countries', ['name' => 'Spain', 'cca3' => 'SPA']);
    assertDatabaseHas('countries', ['name' => 'France', 'cca3' => 'FRA']);
    assertDatabaseHas('countries', ['name' => 'Italy', 'cca3' => 'ITA']);
});
