<?php

namespace Tests\Services\Countries\RestCountries;

use App\DataObjects\CountryData;
use App\Services\Countries\RestCountries\RestCountriesDataSyncProvider;

use function PHPUnit\Framework\assertContainsOnlyInstancesOf;

it('returns countries data from restcountries api', function () {
    $result = app()->get(RestCountriesDataSyncProvider::class)
        ->all();

    assertContainsOnlyInstancesOf(
        CountryData::class,
        $result,
    );
});
