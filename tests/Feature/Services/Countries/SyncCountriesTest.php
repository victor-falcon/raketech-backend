<?php

namespace Tests\Services\Countries;

use App\Services\Countries\CountrySyncProvider;
use App\Services\Countries\SyncCountries;
use Mockery\MockInterface;
use Tests\Stubs\CountriesDataStub;

use function Pest\Laravel\assertDatabaseCount;

test('get and create countries from sync provider', function () {
    app()->bind(
        CountrySyncProvider::class,
        fn () => mock(CountrySyncProvider::class, function (MockInterface $mock) {
            $mock->shouldReceive('all')->andReturn(CountriesDataStub::default());
        })->makePartial()
    );

    $syncCountries = app()->get(SyncCountries::class);

    $syncCountries->sync();

    assertDatabaseCount('countries', 3);
});
