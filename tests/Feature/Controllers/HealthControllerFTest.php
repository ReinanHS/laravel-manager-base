<?php

namespace Reinanhs\LaravelManagerBase\Tests\Feature\Controllers;

use Reinanhs\LaravelManagerBase\Tests\PackageTestCase;
use Symfony\Component\HttpFoundation\Response;

class HealthControllerFTest extends PackageTestCase
{
    public function testCheckHealth(): void
    {
        $this->get(route('api.manager.health'))
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'version' => config('laravel-manager-base.version')
            ]);
    }
}
