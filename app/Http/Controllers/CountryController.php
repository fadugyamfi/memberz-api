<?php

namespace App\Http\Controllers;

use App\Models\Country;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Countries
 */
class CountryController extends ApiController
{
    public function __construct(Country $country) {
        parent::__construct($country);
    }
}
