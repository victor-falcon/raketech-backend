<?php

namespace App\Models;

use App\Collections\Countries;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function newCollection(array $models = []): Countries
    {
        return new Countries($models);
    }
}
