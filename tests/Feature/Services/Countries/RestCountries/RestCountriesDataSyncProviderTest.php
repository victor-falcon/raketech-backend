<?php

namespace Tests\Services\Countries\RestCountries;

use App\DataObjects\CountryData;
use App\Services\Countries\CountriesDataSyncProvider;
use App\Services\Countries\RestCountries\RestCountriesDataSyncProvider;

use function PHPUnit\Framework\assertContainsOnlyInstancesOf;
use function PHPUnit\Framework\assertInstanceOf;

it('returns countries data from rest countries api', function () {
    $result = app()->get(RestCountriesDataSyncProvider::class)
        ->all();

    assertContainsOnlyInstancesOf(
        CountryData::class,
        $result,
    );
});

it('is bind to interface', function () {
    $instance = app()->get(CountriesDataSyncProvider::class);
    assertInstanceOf(RestCountriesDataSyncProvider::class, $instance);
});
