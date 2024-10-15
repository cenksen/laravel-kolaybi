<?php

namespace Cenksen\Kolaybi\Facades;

use Cenksen\Kolaybi\KolayBiClient;
use Illuminate\Support\Facades\Facade;

class KolayBi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return KolayBiClient::class;
    }
}
