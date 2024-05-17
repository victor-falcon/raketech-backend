<?php

namespace App\DataObjects;

readonly class CountryData
{
    public function __construct(
        public string $name,
        public string $cca3,
        public string $flag,
    ) {
    }
}
