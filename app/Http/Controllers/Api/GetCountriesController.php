<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Countries\GetAllCountries;
use Illuminate\Http\JsonResponse;

class GetCountriesController extends Controller
{
    public function __construct(readonly private GetAllCountries $countriesGetter)
    {
    }

    public function __invoke(): JsonResponse
    {
        return response()->jsonCollection(
            ($this->countriesGetter)()
        );
    }
}
