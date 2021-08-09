<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Currencies
 */
class CurrencyController extends ApiController
{
    public function __construct(Currency $currency) {
        parent::__construct($currency);
    }
}
