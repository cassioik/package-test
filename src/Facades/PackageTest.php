<?php

namespace Cassioik\PackageTest\Facades;

use Illuminate\Support\Facades\Facade;

class PackageTest extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'package-test';
    }
}
