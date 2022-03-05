<?php

namespace Reinanhs\LaravelManagerBase\Tests;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Reinanhs\LaravelManagerBase\LaravelManagerBaseServiceProvider;

abstract class PackageTestCase extends OrchestraTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        App::handle(Request::create('/', 'GET'));
    }

    protected function getPackageProviders($app): array
    {
        return [LaravelManagerBaseServiceProvider::class];
    }
}
