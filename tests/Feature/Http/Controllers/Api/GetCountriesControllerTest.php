<?php

namespace Tests\Http\Controllers\Api;

use App\Models\Country;
use Illuminate\Support\Collection;
use Illuminate\Testing\Fluent\AssertableJson;

use function Pest\Laravel\getJson;

$createCountries = function (): Collection {
    return Country::factory()->createMany([
        ['cca3' => 'aaa'],
        ['cca3' => 'bbb'],
        ['cca3' => 'ccc'],
        ['cca3' => 'ddd'],
        ['cca3' => 'eee'],
        ['cca3' => 'fff'],
        ['cca3' => 'ggg'],
        ['cca3' => 'hhh'],
        ['cca3' => 'jjj'],
        ['cca3' => 'kkk'],
    ]);
};

it('return full list of countries', function () use ($createCountries) {
    $expected = $createCountries();

    getJson('/api/countries')
        ->assertOk()
        ->assertJson(fn (AssertableJson $json) => $json
            ->where('data', $expected->toArray())
            ->where('metadata.total', $expected->count())
        );
});
