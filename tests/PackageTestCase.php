<?php

namespace Reinanhs\LaravelManagerBase\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Reinanhs\LaravelManagerBase\LaravelManagerBaseServiceProvider;

abstract class PackageTestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [LaravelManagerBaseServiceProvider::class];
    }
}
